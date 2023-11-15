<table>
    <thead>
        <tr class="fw-bolder text-muted">
            <th class="min-w-150px">Nama Customer</th>
            <th class="min-w-150px">Alamat</th>
            <th class="min-w-150px">PIC</th>
            <th class="min-w-150px">Email</th>
            <th class="min-w-150px">Owner</th>
            <th class="min-w-150px">No Hp PIC</th>
            <th class="min-w-150px">Tipe</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customer as $data)
        <tr>
            <td>{{ $data->nama_customer }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->pic }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->owner }}</td>
            <td>{{ $data->no_hp_pic }}</td>
            <td>{{ $data->tipe }}</td>
        </tr>
    @endforeach
    </tbody>
</table>