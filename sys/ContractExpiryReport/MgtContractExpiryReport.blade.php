<div class="row">

    {{-- <div class="col-12">

        {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger float-end', $Label = 'New Beneficiary', $Icon = 'fa-plus') }}
    </div> --}}

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
                    'TableName' => 'contract_expiry_report',
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
        $rem,
        [],
    ) !!}
</div>
