<table>
    <thead>
        <tr class="fw-bolder text-muted">
            <th class="w-25px">
                No
            </th>
            <th class="min-w-150px">Nama</th>
            <th class="min-w-150px">Username</th>
            <th class="min-w-150px">No Hp</th>
            <th class="min-w-150px">Role</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employee as $data)
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->no_hp }}</td>
            @if($data->role == 's')
            <td>Sopir</td>
            @elseif($data->role == 'b')
            <td>Bos</td>
            @elseif($data->role == 'a')
            <td>Admin</td>
            @elseif($data->role == 'z')
            <td>Semua Hak</td>
            @elseif($data->role == 'sales')
            <td>Sales</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>