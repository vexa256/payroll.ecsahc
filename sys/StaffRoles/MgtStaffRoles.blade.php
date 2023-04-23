<div class="row">

    <div class="col-12">

        {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger float-end', $Label = 'New Beneficiary', $Icon = 'fa-plus') }}
    </div>

</div>
<div class="card-body px-5 py-5 bg-light shadow-lg table-responsive">
    <table class="mytable table table-rounded table-bordered border gy-3 gs-3">
        <thead>
            <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
                <td>{{ $data->id }}</td><td>{{ $data->ClusterID }}</td><td>{{ $data->RoleID }}</td><td>{{ $data->StaffRole }}</td><td>{{ $data->Description }}</td><td>{{ $data->created_at }}</td><td>{{ $data->updated_at }}</td>
                <th class="bg-dark text-light">Actions</th>
            </tr>
        </thead>
        <tbody>
            @isset($DatabaseData)
                @foreach ($DatabaseData as $data)
                    <tr>
                        <td>{{ $data->id }}</td><td>{{ $data->ClusterID }}</td><td>{{ $data->RoleID }}</td><td>{{ $data->StaffRole }}</td><td>{{ $data->Description }}</td><td>{{ $data->created_at }}</td><td>{{ $data->updated_at }}</td>
                        <td>
                            <div class="dropdown">
                                <button
                                    class="btn btn-sm btn-secondary dropdown-toggle"
                                    type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Choose Action
                                </button>
                                <ul class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a data-bs-toggle="modal"
                                            href="#Update{{ $data->id }}"
                                            class="dropdown-item"
                                            href="#">Update</a>
                                    </li>
                                    <li>
                                        <a data-msg="You want to delete this record. This action is not reversible!!"
                                            data-route="{{ route('MassDelete', ['TableName' => 'staff_roles', 'id' => $data->id]) }}"
                                            class="dropdown-item deleteConfirm"
                                            href="#">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
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

                <input type="hidden" name="TableName" value="staff_roles">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'staff_roles') }}
            </div>

            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset

