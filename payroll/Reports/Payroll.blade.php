<div class="col-12 text-center pt-5">
    <div class="card-header pt-5">
        <h3 class="card-title">Payroll Summary Report | Figures in USD</h3>
    </div>
    <div
        class="card-body mt-5 pt-5 bg-light shadow-lg table-responsive text-center">

        {{-- [
                'header' => 'Custom Header',
                'data' => function ($row) {
                    return 'Custom data for row id ' . $row->id;
                },
            ],
     --}}
        {!! generateDynamicTable(
            $employee_payroll_report_view,
            [],
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
                'valid',
                'DID',
                'Type',
                'BID',
                'Taxable',
                'Email',
                'PhoneNumber',
                'Benefit',
                'Description',
                'ContractExpiry',
            ],
            [],
            $TableClass = '.',
        ) !!}
    </div>
</div>
