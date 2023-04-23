@props(['id'])
<div class="dropdown">
    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Choose Action
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li>
            <a data-bs-toggle="modal" href="#Update{{ $id }}" class="dropdown-item">Update</a>
        </li>
        <li>
            <a data-msg="You want to delete this record, This action is not reversible!!" data-route="{{ route('MassDelete', ['TableName' => 'departments', 'id' => $id]) }}" class="dropdown-item deleteConfirm" href="#">Delete</a>
        </li>
    </ul>
</div>
