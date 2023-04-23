<div class="row">

    <div class="col-12">

        {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger float-end', $Label = 'New Benefit', $Icon = 'fa-plus') }}
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
                    'TableName' => 'constant_benefits',
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


<!--end::Card body-->

@include('ConstantBenefits.NewBenefit')

@isset($DatabaseData)
    @foreach ($DatabaseData as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">


                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="constant_benefits">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'constant_benefits') }}
            </div>

            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
