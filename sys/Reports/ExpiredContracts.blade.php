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
                return '<li><a data-bs-toggle="modal" href="#Extend' .
                    $id .
                    '" class="dropdown-item">Extend Contract</a></li>';
            }),

            ($deleteAction = function ($id) {}),
        ],
        $rem,
        [],
    ) !!}
</div>


@isset($DatabaseData)
    @foreach ($DatabaseData as $up)
        <div class="modal fade" id="Extend{{ $up->id }}">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title">Extend contract validity of the
                            Staff Contract for

                            <span class="text-primary">

                                ({{ $up->StaffName }})
                            </span>

                        </h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body ">

                        <form action="{{ route('MassUpdate') }}" class="row"
                            method="POST" enctype=multipart/form-data> @csrf <div
                                class="row">



                                {{ UpdateDate2($name = 'ContractExpiry', $label = 'Contract Expiry', $value = $up->ContractExpiry) }}

                            </div>

                            <input type="hidden" name="TableName"
                                value="employees">

                            <input type="hidden" name="id"
                                value="{{ $up->id }}">




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
    @endforeach
@endisset
