<table>
    <thead>
        <tr class="fw-bolder text-muted">
            <th class="min-w-150px">No Pol</th>
            <th class="min-w-150px">Tipe Unit</th>
            <th class="min-w-150px">No Rangka</th>
            <th class="min-w-150px">No Mesin</th>
            <th class="min-w-150px">Driver</th>
            <th class="min-w-150px">Pemilik</th>
        </tr>
    </thead>
    <tbody>
    @foreach($unit as $data)
        <tr>
            <td>{{ $data->no_pol }}</td>
            <td>{{ $data->type_unit }}</td>
            <td>{{ $data->no_rangka }}</td>
            <td>{{ $data->no_mesin }}</td>
            <td>{{ $data->driver?->nama_driver }}</td>
            <td>{{ $data->owner?->nama_pemilik }}</td>
        </tr>
    @endforeach
    </tbody>
</table>