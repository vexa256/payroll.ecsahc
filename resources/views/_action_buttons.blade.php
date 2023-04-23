@php
    $updateId = 'Update' . $id;
    $deleteId = 'Delete' . $id;
@endphp

<li><a data-bs-toggle="modal" href="#{{ $updateId }}"
        class="dropdown-item">Update</a></li>
<li><a data-msg="You want to delete this record, This action is not reversible!!"
        data-route="{{ route('MassDelete', ['TableName' => 'departments', 'id' => $id]) }}"
        class="dropdown-item deleteConfirm">Delete</a></li>
