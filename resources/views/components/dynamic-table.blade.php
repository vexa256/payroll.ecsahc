@props(['query', 'actions', 'ignoreColumns'])

<table class="mytable table table-rounded table-bordered border gy-3 gs-3">
    <thead>
        <tr class="fw-bold text-gray-800 border-bottom border-gray-200">
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
            @if ($actions)
                <th class="bg-dark text-light">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $value)
                    <td>{{ $value }}</td>
                @endforeach

                @if ($actions)
                    <td>
                        {{ $actions($row) }}
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
