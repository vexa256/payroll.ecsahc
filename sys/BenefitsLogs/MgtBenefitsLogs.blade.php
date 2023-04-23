<div class="row">

    <div class="col-12">

        {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger float-end', $Label = 'New Beneficiary', $Icon = 'fa-plus') }}
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
                    'TableName' => 'departments',
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

@include('Beneficiary.NewBeneficiary')

@isset($Roles)
    @foreach ($Roles as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">

                <div class="mb-3 col-md-12 pt-3">
                    <label id="label" for=""
                        class=" required form-label">Select
                        Parent Cluster</label>
                    <select required name="ClusterID"
                        class="form-select   form-select-solid"
                        data-control="select2" data-placeholder="Select an option">

                        <option value="{{ $up->ClusterID }}">
                            {{ $up->ClusterName }}</option>

                        @isset($Clusters)
                            @foreach ($Clusters as $data)
                                <option value="{{ $data->ClusterID }}">
                                    {{ $data->ClusterName }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>

                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="benefits_logs">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'benefits_logs') }}
            </div>

            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
