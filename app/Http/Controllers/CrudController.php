<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
// app/Helpers/InputTypeValidation.php

    public function getInputTypeValidationRules($inputType)
    {
        $rules = [];

        switch ($inputType) {
            case 'text':
            case 'textarea':
                $rules = ['required', 'string', 'max:255'];
                break;
            case 'email':
                $rules = ['required', 'email', 'max:255'];
                break;
            case 'number':
                $rules = ['required', 'numeric'];
                break;
            case 'file':
                $rules = ['required', 'file', 'max:9048'];
                break;
        }

        return $rules;
    }

    public function MassInsert(Request $request)
{
    $tableName = $request->TableName;
    // Check if the table exists
    if (!Schema::hasTable($tableName)) {

        return redirect()
            ->back()
            ->with('error_a', 'The specified table does not exist');
    }

    // Get the table columns
    $columns = Schema::getColumnListing($tableName);

    // Prepare the validation rules
    $validationRules = [];

    foreach ($columns as $column) {
        if ($request->has($column)) {
            $inputType                = $request->input($column . '_type');
            $validationRules[$column] = $this->getInputTypeValidationRules($inputType);
        }
    }

    // Validate the request data
    $validator = Validator::make($request->all(), $validationRules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Prepare the data for mass insertion
    $data = [];

    foreach ($columns as $column) {
        if ($request->has($column)) {
            // Use $request->file() instead of $request->input() for file inputs
            $inputValue = $request->file($column);
            if ($inputValue instanceof UploadedFile) {
                // Handle file uploads using Laravel's file storage methods
                $file = $inputValue;
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $filename);
                $data[$column] = asset('storage/uploads/' . $filename);

            } else {
                $data[$column] = $request->input($column);
            }
        }
    }

    // Perform the mass insertion
    DB::table($tableName)->insert($data);

    return redirect()
        ->back()
        ->with('status', 'The record was created successfully');
}



    public function MassDelete($TableName, $id)
    {
        DB::table($TableName)->where('id', $id)->delete();

        return redirect()
            ->back()
            ->with('status', 'The record was deleted successfully');
    }

    public function MassUpdate(Request $request)
    {
        // Get the table name and record ID from the request
        $tableName = $request->input('TableName');
        $recordId  = $request->input('id');

        // Check if the table exists
        if (!Schema::hasTable($tableName)) {
            return redirect()
                ->back()
                ->with('error_a', 'The specified table does not exist');
        }

        // Get the table columns
        $columns = Schema::getColumnListing($tableName);

        // Prepare the validation rules
        $validationRules = [];

        foreach ($columns as $column) {
            if ($request->has($column)) {
                $inputType                = $request->input($column . '_type');
                $validationRules[$column] = $this->getInputTypeValidationRules($inputType);
            }
        }

        // Validate the request data
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Prepare the data for updating the record
        $data = [];

        foreach ($columns as $column) {
            if ($request->has($column) && !empty($request->input($column))) { // Check if the field has data
                if ($request->input($column . '_type') === 'file') {
                    // Check if a file was supplied
                    if ($request->hasFile($column)) {
                        // Handle file uploads using Laravel's file storage methods
                        $file = $request->file($column);
                        $filename = $file->getClientOriginalName();
                        $path = $file->storeAs('uploads', $filename);
                        $data[$column] = asset('storage/uploads/' . $filename);

                    }
                } else {
                    $data[$column] = $request->input($column);
                }
            }
        }

        // Perform the record update
        DB::table($tableName)->where('id', $recordId)->update($data);

        return redirect()
            ->back()
            ->with('status', 'The record was updated successfully');
    }


}
