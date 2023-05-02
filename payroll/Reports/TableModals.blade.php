<div class="modal fade" id="CBList">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">List of Constant Benefits Applied
                    (USD)

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                {!! generateDynamicTable(
                    $constant_benefits_report_details,
                    [
                        ($updateAction = function ($id) {}),

                        ($deleteAction = function ($id) {
                            $deleteRoute = route('MassDelete', [
                                'TableName' => 'benefits_assigned_to_staff',
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
                        'EmpID',

                        'TID',
                        'id',
                        'Designation',
                        'DepartmentID',
                        'ClusterID',
                        'payrollID',
                        'JoiningDate',
                        'created_at',
                        'updated_at',
                        'EmployeeType',
                        'StaffName',

                        'BasicSalaryPerMonthInUsd',
                        'valid',

                        'DID',
                        'Type',
                        'BID',
                        'Taxable',
                        'Email',
                        'PhoneNumber',

                        'ContractExpiry',
                    ],
                    [],
                    $TableClass = 'mytable',
                ) !!}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>


            </div>

        </div>
    </div>
</div>






<div class="modal fade" id="CDList">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">List of Constant Deductions Applied
                    (USD)
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                {!! generateDynamicTable(
                    $constant_deductions_report_details,
                    [
                        ($updateAction = function ($id) {}),

                        ($deleteAction = function ($id) {
                            $deleteRoute = route('MassDelete', [
                                'TableName' => 'deduction_assigned_to_staff',
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
                        'EmpID',

                        'TID',
                        'id',
                        'Designation',
                        'DepartmentID',
                        'ClusterID',
                        'payrollID',
                        'JoiningDate',
                        'created_at',
                        'updated_at',
                        'EmployeeType',
                        'StaffName',

                        'BasicSalaryPerMonthInUsd',
                        'valid',

                        'DID',
                        'Type',
                        'BID',
                        'Taxable',
                        'Email',
                        'PhoneNumber',

                        'ContractExpiry',
                    ],
                    [],
                    $TableClass = 'mytable',
                ) !!}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>


            </div>

        </div>
    </div>
</div>














<div class="modal fade" id="PBList">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">List of Percentage Benefits Applied
                    (USD)
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                {!! generateDynamicTable(
                    $percentage_benefits_report_details,
                    [
                        ($updateAction = function ($id) {}),

                        ($deleteAction = function ($id) {
                            $deleteRoute = route('MassDelete', [
                                'TableName' => 'benefits_assigned_to_staff',
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
                        'EmpID',

                        'TID',
                        'id',
                        'Designation',
                        'DepartmentID',
                        'ClusterID',
                        'payrollID',
                        'JoiningDate',
                        'created_at',
                        'updated_at',
                        'EmployeeType',
                        'StaffName',

                        'BasicSalaryPerMonthInUsd',
                        'valid',

                        'DID',
                        'Type',
                        'BID',
                        'Taxable',
                        'Email',
                        'PhoneNumber',

                        'ContractExpiry',
                    ],
                    [],
                    $TableClass = 'mytable',
                ) !!}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>


            </div>

        </div>
    </div>
</div>


















<div class="modal fade" id="PDList">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">List of Percentage Deductions Applied
                    (USD)
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                {!! generateDynamicTable(
                    $percentage_deductions_report_details,
                    [
                        ($updateAction = function ($id) {}),

                        ($deleteAction = function ($id) {
                            $deleteRoute = route('MassDelete', [
                                'TableName' => 'deduction_assigned_to_staff',
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
                        'EmpID',

                        'TID',
                        'PDID',
                        'id',
                        'Designation',
                        'DepartmentID',
                        'ClusterID',
                        'payrollID',
                        'JoiningDate',
                        'created_at',
                        'updated_at',
                        'EmployeeType',
                        'StaffName',

                        'BasicSalaryPerMonthInUsd',
                        'valid',

                        'DID',
                        'Type',
                        'BID',
                        'Taxable',
                        'Email',
                        'PhoneNumber',

                        'ContractExpiry',
                    ],
                    [],
                    $TableClass = 'mytable',
                ) !!}

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>


            </div>

        </div>
    </div>
</div>
