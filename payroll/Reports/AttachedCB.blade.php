<!-- Modal -->
<div class="modal fade" id="CB" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">All Constant Benefits
                    Attached to the payroll of <span
                        class="text-danger">{{ $StaffName }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div
                        class="card-body px-5 py-5 bg-light shadow-lg table-responsive">

                        {{-- [
                'header' => 'Custom Header',
                'data' => function ($row) {
                    return 'Custom data for row id ' . $row->id;
                },
            ],
     --}}
                        {!! generateDynamicTable(
                            $constant_benefits_report_details,
                            [],
                            $rem,
                            [],
                        ) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save
                    changes</button> --}}
            </div>
        </div>
    </div>
</div>
