 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
     data-kt-menu-placement="bottom-start"
     class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
     <!--begin:Menu link--> <span class="menu-link"> <span
             class="menu-title text-light fw-bold" style="font-size:14px">
             <i class="fas fa-cogs fa-3x text-light me-2 fw-bold "
                 aria-hidden="true"></i>

             Data
             Settings</span> <span class="menu-arrow d-lg-none"></span> </span>
     <!--end:Menu link-->
     <!--begin:Menu sub-->
     <div
         class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-300px">
         <!--begin:Menu item-->
         <?php

         MenuItem($link = route('MgtDepts'), $label = 'Departments');
         MenuItem($link = route('MgtClusters'), $label = 'Clusters');
         MenuItem($link = route('MgtStaffRoles'), $label = 'Staff Roles');
         MenuItem($link = route('MgtPayrollLabels'), $label = 'Payroll Labels');

         ?>

         <!--end:Menu item-->
     </div>
     <!--end:Menu sub-->
 </div>


 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
     data-kt-menu-placement="bottom-start"
     class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
     <!--begin:Menu link--> <span class="menu-link"> <span
             class="menu-title text-light fw-bold" style="font-size:14px">
             <i class="fas fa-user-cog fa-3x text-light me-2 fw-bold "
                 aria-hidden="true"></i>

             HR Data</span> <span class="menu-arrow d-lg-none"></span> </span>
     <!--end:Menu link-->
     <!--begin:Menu sub-->
     <div
         class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-300px">
         <!--begin:Menu item-->
         <?php

         MenuItem($link = route('MgtEmp'), $label = 'Staff Database');
         MenuItem($link = route('SelectSelectStaffMemberBeneficiary'), $label = 'Staff Beneficiaries');
         MenuItem($link = route('SelectStaffForBenefits'), $label = 'Staff Benefits');
         MenuItem($link = route('StaffContractValidity'), $label = 'Contract Validity');
         MenuItem($link = route('SoonExpiringContracts'), $label = 'Soon Expiring Contracts');
         MenuItem($link = route('ExpiredContracts'), $label = 'Expired  Contracts');
         MenuItem($link = route('StaffDemographics'), $label = 'Staff Demographics Analysis');
         MenuItem($link = route('StaffDocsSelect'), $label = 'Staff Documentation');

         ?>

         <!--end:Menu item-->
     </div>
     <!--end:Menu sub-->
 </div>


 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
     data-kt-menu-placement="bottom-start"
     class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
     <!--begin:Menu link--> <span class="menu-link"> <span
             class="menu-title text-light fw-bold" style="font-size:14px">
             <i class="fas fa-coins fa-3x text-light me-2 fw-bold "
                 aria-hidden="true"></i>

             Payroll</span> <span class="menu-arrow d-lg-none"></span> </span>
     <!--end:Menu link-->
     <!--begin:Menu sub-->
     <div
         class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-300px">
         <!--begin:Menu item-->
         <?php

         MenuItem($link = route('MgtConstantBenefits'), $label = 'Payroll Constant Benefits');
         MenuItem($link = route('MgtPercentageBenefits'), $label = 'Payroll Percentage Benefits');
         MenuItem($link = route('MgtPercentageDeductions'), $label = 'Payroll Percentage Deductions');
         MenuItem($link = route('MgtConstantDeductions'), $label = 'Payroll Constant Deductions');
         MenuItem($link = route('MgtTaxes'), $label = 'Payroll Taxes');
         MenuItem($link = route('PayrollSelectPayroll'), $label = 'Set Staff Payroll');
         MenuItem($link = '#dfg', $label = 'Execute Payroll');
         MenuItem($link = '#dfg', $label = 'Payroll Journal (Monthly)');
         MenuItem($link = '#dfg', $label = 'Payroll Journal (Yearly)');

         ?>

         <!--end:Menu item-->
     </div>
     <!--end:Menu sub-->
 </div>



 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
     data-kt-menu-placement="bottom-start"
     class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
     <!--begin:Menu link--> <span class="menu-link"> <span
             class="menu-title text-light fw-bold" style="font-size:14px">
             <i class="fas fa-wrench fa-3x text-light me-2 fw-bold "
                 aria-hidden="true"></i>

             User Settings</span> <span class="menu-arrow d-lg-none"></span>
     </span>
     <!--end:Menu link-->
     <!--begin:Menu sub-->
     <div
         class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-300px">
         <!--begin:Menu item-->
         <?php

         MenuItem($link = '#dfg', $label = 'Manage Admins');
         MenuItem($link = '#dfg', $label = 'Manage HR and Finance Accounts');

         ?>

         <a href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
             class="menu-link  null" data-route="null">
             <span class="menu-bullet">
                 <i class="me-2 fas fa-circle-notch text-danger "></i>
             </span>
             <span class="menu-title fs-6">

                 Logout

             </span>
         </a>

         <!--end:Menu item-->
     </div>
     <!--end:Menu sub-->
 </div>




 <form id="logout-form" action="{{ route('logout') }}" method="POST"
     class="d-none">
     @csrf
 </form>
