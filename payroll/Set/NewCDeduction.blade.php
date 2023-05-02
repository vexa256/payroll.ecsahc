<div class="modal fade" id="NewCD">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Attach a constant deduction to the
                    payroll for the staff
                    member {{ $StaffName }}


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('AddCD') }}" class="row"
                    method="GET" enctype=multipart/form-data> @csrf
                    <div class="row">



                        <div class="mb-3 col-md-4  ">
                            <label id="label" for=""
                                class="pt-3 required form-label"> Constant
                                deduction to attach to the staff member</label>
                            <select required name="DID"
                                class="form-select   form-select-solid"
                                data-control="select2"
                                data-placeholder="Select a option">
                                <option></option>
                                @isset($constant_deductions)

                                    @foreach ($constant_deductions as $data)
                                        <option value="{{ $data->CDID }}">
                                            {{ $data->Deduction }}</option>
                                    @endforeach
                                @endisset

                            </select>

                        </div>



                        @foreach ($CDForm as $data)
                            @if ($data['type'] == 'string')
                                {{ CreateInputText($data, $placeholder = null, $col = '4') }}
                            @elseif (
                                'smallint' == $data['type'] ||
                                    'bigint' === $data['type'] ||
                                    'decimal' == $data['type'] ||
                                    'float' == $data['type'] ||
                                    'integer' == $data['type'] ||
                                    'decimal' == $data['type'] ||
                                    'bigint' == $data['type']
                            )
                                {{ CreateInputInteger($data, $placeholder = null, $col = '4') }}
                            @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')
                                {{ CreateInputDate($data, $placeholder = null, $col = '4') }}
                            @endif
                        @endforeach

                    </div>

                    <div class="row">
                        @foreach ($CDForm as $data)
                            @if ($data['type'] == 'text')
                                {{ CreateInputEditor($data, $placeholder = null, $col = '12') }}
                            @endif
                        @endforeach

                    </div>
                    <input type="hidden" name="EmpID"
                        value="{{ $EmpID }}">

                    <input type="hidden" name="TableName"
                        value="deduction_assigned_to_staff">




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark">Save
                    Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
