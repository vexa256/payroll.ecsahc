 <!--begin::Card body-->
 <div class=" pt-3 bg-light  table-responsive">

     <div class="float-end row ">

         <div class="col-md-12">

             {{ HeaderBtn($Toggle = 'NewEmp', $Class = 'btn-danger', $Label = 'New Staff', $Icon = 'fa-plus') }}


         </div>
     </div>
 </div>
 <div class="card-body pt-3 bg-light shadow-lg table-responsive px-5 py-5">
     <table
         class=" mytable table table-rounded table-bordered  border gy-3 gs-3 px-5 py-5">
         <thead>
             <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                 <th>Name</th>
                 <th>Contract End</th>
                 <th>Code</th>
                 <th>Designation</th>
                 <th>Gender</th>
                 {{-- <th>Supervisor</th> --}}
                 <th>Dept</th>
                 <th>Edit</th>
                 <th>Trash</th>
                 <th class="bg-dark text-light"> Actions</th>

             </tr>
         </thead>
         <tbody>
             @isset($Employees)
                 @foreach ($Employees as $data)
                     <tr>
                         <td>{{ $data->StaffName }}</td>
                         <td>{{ date('j, M, Y', strtotime($data->ContractExpiry)) }}
                         </td>
                         <td>{{ $data->StaffCode }}</td>
                         <td>{{ $data->StaffRole }}</td>
                         <td>{{ $data->Gender }}</td>
                         {{-- <td>{{ $data->ReportsTo }}</td> --}}
                         <td>{{ $data->DepartmentName }}</td>
                         <td>

                             <a href="#Update{{ $data->id }}"
                                 data-bs-toggle="modal"
                                 class="btn shadow-lg btn-danger  btn-sm">

                                 <i class="fas fa-edit" aria-hidden="true"></i>

                             </a>

                         </td>
                         <td>

                             <a href="#"
                                 data-route="{{ route('MassDelete', ['TableName' => 'employees', 'id' => $data->id]) }}"
                                 data-msg="You want to delete this staff member's records"
                                 class="btn shadow-lg btn-danger deleteConfirm btn-sm">

                                 <i class="fas fa-trash" aria-hidden="true"></i>

                             </a>

                         </td>

                         <td class="row fs-6">
                             <div class="col-md-6">
                                 <div class="dropdown">
                                     <button
                                         class="btn btn-sm  btn-secondary dropdown-toggle"
                                         type="button" id="dropdownMenuButton1"
                                         data-bs-toggle="dropdown"
                                         aria-expanded="false">
                                         HR Actions
                                     </button>
                                     <ul class="dropdown-menu"
                                         aria-labelledby="dropdownMenuButton1">
                                         <li><a data-route="{{ route('EndContract', ['id' => $data->id]) }}"
                                                 data-msg="You sure you want to end this staff member's contract"
                                                 class="dropdown-item deleteConfirm"
                                                 href="#">End Contract</a>
                                         </li>

                                         <li><a data-bs-toggle="modal"
                                                 class="dropdown-item "
                                                 href="#PersonalDetails{{ $data->id }}">Personal
                                                 Details</a></li>

                                         <li><a data-bs-toggle="modal"
                                                 class="dropdown-item "
                                                 href="#BankDetails{{ $data->id }}">Bank
                                                 Details</a></li>

                                         <li><a data-bs-toggle="modal"
                                                 class="dropdown-item "
                                                 href="#Extend{{ $data->id }}">Extend
                                                 contract</a></li>







                                     </ul>
                                 </div>


                             </div>
                         </td>

                     </tr>
                 @endforeach
             @endisset



         </tbody>
     </table>
 </div>
 <!--end::Card body-->

 {{-- @include('Employees.update') --}}
 @include('Employees.NewEmp')
 @include('Employees.BankDetails')
 @include('Employees.PersonalDetails')
 @include('Employees.Extend')


 @isset($Employees)
     @foreach ($Employees as $up)
         {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
         <form action="{{ route('MassUpdate') }}" class="" method="POST">
             @csrf

             <div class="row">

                 <div class="mb-3 mt-3 col-md-4">
                     <label id="label" for="exampleFormControlInput1"
                         class="required form-label">Assigned
                         Payroll</label>
                     <select name="AssignedPayroll" required
                         class="form-select form-control-sm  form-control"
                         data-control="select2" data-placeholder="Select an option">
                         <option></option>
                         @isset($Payrolls)
                             @foreach ($Payrolls as $s)
                                 <option value="{{ $s->PayrollID }}">
                                     {{ $s->PayrollName }}</option>
                             @endforeach
                         @endisset
                     </select>

                 </div>


                 <div class="mb-3 mt-3 col-md-4">
                     <label id="label" for="exampleFormControlInput1"
                         class="required form-label">Employee
                         Type</label>
                     <select name="EmployeeType" required
                         class="form-select form-control-sm  form-control"
                         data-control="select2" data-placeholder="Select an option">
                         <option></option>
                         <option value="International Staff">
                             International Staff
                         </option>

                         <option value="Local Staff">Local Staff
                         </option>

                     </select>

                 </div>

                 <div class="mb-3 mt-3 col-md-4">
                     <label id="label" for="exampleFormControlInput1"
                         class="required form-label">Department</label>
                     <select name="ClusterID" required
                         class="form-select form-control-sm  form-control"
                         data-control="select2" data-placeholder="Select an option">
                         <option></option>
                         @isset($Clusters)
                             @foreach ($Clusters as $e)
                                 <option value="{{ $e->ClusterID }}">
                                     {{ $e->ClusterName }}</option>
                             @endforeach
                         @endisset
                     </select>

                 </div>
                 <div class="mb-3 mt-3 col-md-4">
                     <label id="label" for="exampleFormControlInput1"
                         class="required form-label">Reports To</label>
                     <select name="ReportsTo" required
                         class="form-select form-control-sm  form-control"
                         data-control="select2" data-placeholder="Select an option">

                         <option></option>

                         @isset($Roles)
                             @foreach ($Roles as $data)
                                 <option value="{{ $data->RoleID }}">
                                     {{ $data->StaffRole }}</option>
                             @endforeach
                         @endisset
                     </select>

                 </div>

                 <div class="mb-3 mt-3 col-md-4">
                     <label id="label" for="exampleFormControlInput1"
                         class="required form-label">Gender</label>
                     <select name="Gender" required
                         class="form-select form-control-sm  form-control"
                         data-control="select2" data-placeholder="Select an option">
                         <option></option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>


                     </select>

                 </div>

                 <div class="mb-3 mt-3 col-md-4">
                     <label id="label" for="exampleFormControlInput1"
                         class="required form-label">Designation</label>
                     <select name="RoleID" required
                         class="form-select form-control-sm  form-control"
                         data-control="select2" data-placeholder="Select an option">
                         <option></option>
                         @isset($Roles)
                             @foreach ($Roles as $d)
                                 <option value="{{ $d->RoleID }}">
                                     {{ $d->StaffRole }}</option>
                             @endforeach
                         @endisset
                     </select>

                 </div>

                 <input type="hidden" name="id"
                     value="{{ $up->id }}">

                 <input type="hidden" name="TableName" value="employees">

                 {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'employees') }}
             </div>


             {{ _UpdateModalFooter() }}

         </form>
     @endforeach
 @endisset
