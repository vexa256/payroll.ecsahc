<div class="row">

    <div class="col-12">

        {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger float-end', $Label = 'New Cluster', $Icon = 'fa-plus') }}
    </div>

</div>
<div class="card-body px-5 py-5 bg-light shadow-lg table-responsive">

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Cluster Name</th>
                <th>About Cluster</th>
                <th>Parent Department</th>

                <th class="bg-dark text-light"> Actions</th>



            </tr>
        </thead>
        <tbody>
            @isset($Clusters)
                @foreach ($Clusters as $data)
                    <tr>
                        <td>{{ $data->ClusterName }}</td>
                        <td>{{ $data->Description }}</td>
                        <td>{{ $data->DepartmentName }}</td>



                        <td>
                            <div class="dropdown">
                                <button
                                    class="btn btn-sm  btn-secondary dropdown-toggle"
                                    type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Choose Action
                                </button>
                                <ul class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton1">

                                    <li><a data-bs-toggle="modal"
                                            href="#Update{{ $data->id }}"
                                            class="dropdown-item "
                                            href="#">Update</a></li>


                                    <li><a data-msg="You want to delete this record, This action is not reversible!!"
                                            data-route="{{ route('MassDelete', ['TableName' => 'clusters', 'id' => $data->id]) }}"
                                            class="dropdown-item deleteConfirm"
                                            href="#">Delete</a></li>

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

@include('Clusters.NewCluster')

@isset($Clusters)
    @foreach ($Clusters as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">

                <div class="mb-3 col-md-12 pt-3">
                    <label id="label" for=""
                        class=" required form-label">Select
                        Parent Department</label>
                    <select required name="DepartmentID"
                        class="form-select   form-select-solid"
                        data-control="select2" data-placeholder="Select an option">

                        <option value="{{ $up->DepartmentID }}">
                            {{ $up->DepartmentName }}</option>

                        @isset($Departments)
                            @foreach ($Departments as $data)
                                <option value="{{ $data->DepartmentID }}">
                                    {{ $data->DepartmentName }}</option>
                            @endforeach
                        @endisset




                    </select>



                </div>

                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="clusters">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'clusters') }}
            </div>


            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
