<div class="modal fade" id="NewEmp" style="height: 800px">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create new employee record |


                    Applicable PDF uploads should be added to the staff
                    documentation section


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('MassInsert') }}" class="row"
                    method="POST" enctype=multipart/form-data> @csrf <div
                        class="row">
                        <div class="mb-3 mt-3 col-md-4">
                            <label id="label" for="exampleFormControlInput1"
                                class="required form-label">Assigned
                                Payroll</label>
                            <select name="AssignedPayroll" required
                                class="form-select form-control-sm  form-control"
                                data-control="select2"
                                data-placeholder="Select an option">
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
                                data-control="select2"
                                data-placeholder="Select an option">
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
                                class="required form-label">Cluster</label>
                            <select name="ClusterID" required
                                class="form-select form-control-sm  form-control"
                                data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                @isset($Clusters)

                                    @foreach ($Clusters as $x)
                                        <option value="{{ $x->ClusterID }}">
                                            {{ $x->ClusterName }}</option>
                                    @endforeach
                                @endisset
                            </select>

                        </div>
                        <div class="mb-3 mt-3 col-md-3">
                            <label id="label" for="exampleFormControlInput1"
                                class="required form-label">Reports To</label>
                            <select name="ReportsTo" required
                                class="form-select form-control-sm  form-control"
                                data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                @isset($Roles)

                                    @foreach ($Roles as $data)
                                        <option value="{{ $data->RoleID }}">
                                            {{ $data->StaffRole }}</option>
                                    @endforeach
                                @endisset
                            </select>

                        </div>

                        <div class="mb-3 mt-3 col-md-3">
                            <label id="label" for="exampleFormControlInput1"
                                class="required form-label">Gender</label>
                            <select name="Gender" required
                                class="form-select form-control-sm  form-control"
                                data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>


                            </select>

                        </div>

                        <div class="mb-3 mt-3 col-md-3">
                            <label id="label" for="exampleFormControlInput1"
                                class="required form-label">Designation</label>
                            <select name="RoleID" required
                                class="form-select form-control-sm  form-control"
                                data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                @isset($Roles)

                                    @foreach ($Roles as $d)
                                        <option value="{{ $d->RoleID }}">
                                            {{ $d->StaffRole }}</option>
                                    @endforeach
                                @endisset
                            </select>

                        </div>
                        @foreach ($Form as $data)
                            @if ($data['type'] == 'string')
                                {{ CreateInputText($data, $placeholder = null, $col = '3') }}
                            @elseif (
                                'smallint' == $data['type'] ||
                                    'bigint' === $data['type'] ||
                                    'decimal' == $data['type'] ||
                                    'float' == $data['type'] ||
                                    'integer' == $data['type'] ||
                                    'decimal' == $data['type'] ||
                                    'bigint' == $data['type']
                            )
                                {{ CreateInputInteger($data, $placeholder = null, $col = '3') }}
                            @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')
                                {{ CreateInputDate($data, $placeholder = null, $col = '3') }}
                            @endif
                        @endforeach

                    </div>

                    <div class="row">
                        @foreach ($Form as $data)
                            @if ($data['type'] == 'text')
                                {{ CreateInputEditor($data, $placeholder = null, $col = '12') }}
                            @endif
                        @endforeach

                    </div>


                    <input type="hidden" name="EmpID"
                        value="{{ md5(uniqid() . 'AFC' . date('Y-m-d H:I:S')) }}"></input>


                    <input type="hidden" name="TableName"
                        value="employees"></input>



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
