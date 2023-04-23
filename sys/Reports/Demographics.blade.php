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
        [($updateAction = function ($id) {}), ($deleteAction = function ($id) {})],
        $rem,
        [],
    ) !!}
</div>
