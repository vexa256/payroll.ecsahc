<div class="row">

    <div class="pt-5 mt-5 col-3">

        {!! generateDynamicCard(
            $constant_benefits_report_view,
            [],
            [
                'EmpID',
                'Amount',
                'ValidTo',
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
                'Description',
                'Benefit',
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
            $CardClass = 's',
            $CardTitle = 'Total Constant Benefits',
        ) !!}

    </div>


    <div class="pt-5 mt-5 col-3">

        {!! generateDynamicCard(
            $constant_deductions_report_view,
            [],
            [
                'EmpID',
                'ValidTo',
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
                'Description',
                'Benefit',
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
            $CardClass = 's',
            $CardTitle = 'Total Constant Deductions',
        ) !!}

    </div>


    <div class="pt-5 mt-5 col-3">

        {!! generateDynamicCard(
            $percentage_benefits_report,
            [],
            [
                'EmpID',
                'ValidTo',
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
                'Description',
                'Benefit',
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
            $CardClass = 's',
            $CardTitle = 'Total Percentage Benefits',
        ) !!}

    </div>


    <div class="pt-5 mt-5 col-3">

        {!! generateDynamicCard(
            $percentage_deductions_report_view,
            [],
            [
                'EmpID',
                'ValidTo',
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
                'Description',
                'Benefit',
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
            $CardClass = 's',
            $CardTitle = 'Total Percentage Deductions',
        ) !!}

    </div>



</div>
