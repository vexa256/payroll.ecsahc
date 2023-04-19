<div class="row">

    <div class="col-12">

        {{ HeaderBtn($Toggle = 'NewDept', $Class = 'btn-danger float-end', $Label = 'New Department', $Icon = 'fa-plus') }}
    </div>

</div>
<div class="card-body px-5 py-5 bg-light shadow-lg table-responsive">

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Department Name</th>
                <th>About Department</th>

                <th class="bg-dark text-light"> Actions</th>



            </tr>
        </thead>
        <tbody>
            @isset($Departments)
                @foreach ($Departments as $data)
                    <tr>
                        <td>{{ $data->DepartmentName }}</td>
                        <td>{{ $data->Description }}</td>



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
                                            data-route="{{ route('MassDelete', ['TableName' => 'departments', 'id' => $data->id]) }}"
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

@include('Departments.NewDept')

@isset($Departments)
    @foreach ($Departments as $up)
        {{ UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $up->id) }}
        <form action="{{ route('MassUpdate') }}" class="" method="POST">
            @csrf

            <div class="row">

                <input type="hidden" name="id" value="{{ $up->id }}">

                <input type="hidden" name="TableName" value="departments">

                {{ RunUpdateModalFinal($ModalID = $up->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $up->id, $col = '4', $te = '12', $TableName = 'departments') }}
            </div>


            {{ _UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
