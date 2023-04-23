<div class="row">

    <div class="col-12">

        {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger float-end', $Label = 'New Record', $Icon = 'fa-plus') }}
    </div>

</div>
<div class="card-body px-5 py-5 bg-light shadow-lg table-responsive">

    {{-- [
                'header' => 'Custom Header',
                'data' => function ($row) {
                    return 'Custom data for row id ' . $row->id;
                },
            ],
     --}}
    {!! generateDynamicTable(
        $DatabaseData,
        [
            ($updateAction = function ($id) {
                return '<li><a data-bs-toggle="modal" href="#Update' .
                    $id .
                    '" class="dropdown-item">Update</a></li>';
            }),

            ($deleteAction = function ($id) {
                $deleteRoute = route('MassDelete', [
                    'TableName' => 'staff_non_salary_benefits',
                    'id' => $id,
                ]);
                $deleteMsg =
                    'You want to delete this record, This action is not reversible!!';

                return '<li><a data-msg="' .
                    $deleteMsg .
                    '" data-route="' .
                    $deleteRoute .
                    '" class="dropdown-item deleteConfirm">Delete</a></li>';
            }),
        ],
        [
            'DepartmentID',
            'ClusterID',
            'StaffName',
            'IDType',
            'PdfIdScan',
            'Gender',
            'RoleID',
            'created_at',
            'updated_at',
            'id',
            'EmpID',

            'DOCID',
            'Department',
        ],
        [],
    ) !!}
</div>


<!--end::Card body-->

@include('StaffDocs.NewDoc')

@isset($DatabaseData)
    @foreach ($DatabaseData as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">
                <div class="mb-3 col-md-4">
                    <label id="label" for=""
                        class=" required form-label">Upload
                        Document (PDF)</label>
                    <input type="file" name="DocURL" class="form-control "
                        accept=".pdf">
                </div>


                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="staff_docs">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'staff_docs') }}
            </div>

            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset


@include('pdf.PDFJS')
