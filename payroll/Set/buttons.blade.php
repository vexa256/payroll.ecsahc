@php
    use Illuminate\Support\Str;
@endphp

<div class="row float-end d-flex justify-content-end">


    <div class="col-4">
        <div class="dropdown float-end mb-2">
            <button class="btn btn-sm btn-danger dropdown-toggle shadow-lg"
                type="button" id="payrollActionsDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-chart-line"></i>
                View Set Payroll Data
            </button>
            <ul class="dropdown-menu mt-5"
                aria-labelledby="payrollActionsDropdown">
                <li>

                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#CBSummary"><i
                            class="fas fa-plus"></i>
                        Constant Benefits Summary Report</a>


                </li>

                <li> <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#CB"><i
                            class="fas fa-plus"></i> Attached Constant Benefits
                        Detailed Report
                    </a> </li>





                <li> <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#CD"><i
                            class="fas fa-minus"></i> Attached Constant
                        Deductions
                        Detailed Report
                    </a> </li>



                <li> <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#CDSummary"><i
                            class="fas fa-minus"></i> Attached Constant
                        Deductions
                        Summary
                    </a> </li>





            </ul>
        </div>
    </div>
    <div class="col-4">
        <div class="dropdown float-end mb-2">
            <button class="btn btn-sm btn-primary dropdown-toggle shadow-lg"
                type="button" id="payrollActionsDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-cog"></i>
                Payroll Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="payrollActionsDropdown">
                <li>
                    <div class="dropdown-header"><i
                            class="fas fa-paperclip"></i>
                        Attach Deductions/Benefits</div>
                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewTax"><i
                            class="fas fa-minus"></i>
                        Attach Tax</a>

                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewCD"><i
                            class="fas fa-minus"></i>
                        Attach Constant Deduction</a>
                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewPD"><i
                            class="fas fa-percent"></i>
                        Attach Percentage Deduction</a>
                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewCB"><i
                            class="fas fa-plus"></i> Attach
                        Constant Benefit</a>
                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewPB"><i
                            class="fas fa-percent"></i>
                        Attach Percentage Benefit</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewDept"><i
                            class="fas fa-play"></i>
                        Execute Payroll</a></li>
                <li><a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewDept"><i
                            class="fas fa-file-alt"></i>
                        Employee Payroll Report</a></li>
            </ul>
        </div>
    </div>


    <div class="col-4">
        <div class="dropdown float-end mb-2">
            <button
                class="btn btn-sm btn-dark shadow-lg dropdown-toggle shadow-lg"
                type="button" id="payrollActionsDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-cog"></i>
                Payroll History
            </button>
            <ul class="dropdown-menu" aria-labelledby="payrollActionsDropdown">
                <li>
                    <div class="dropdown-header"><i
                            class="fas fa-paperclip"></i>
                        Attach Deductions/Benefits</div>
                    <a class="dropdown-item" href="#"
                        data-bs-toggle="modal" data-bs-target="#NewDept"><i
                            class="fas fa-minus"></i>
                        Attach Constant Deduction</a>

                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

            </ul>
        </div>
    </div>

</div>
