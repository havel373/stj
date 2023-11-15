<table>
    <thead>
        <tr class="fw-bolder text-muted">
            <th class="min-w-125px">Tanggal</th>
            <th class="min-w-125px">No Pol</th>
            <th class="min-w-125px">Tipe Unit</th>
            <th class="min-w-125px">Driver</th>
            <th class="min-w-125px">Customer</th>
            <th class="min-w-125px">Muat</th>
            <th class="min-w-125px">Bongkar</th>
            <th class="min-w-125px">Note</th>
            <th class="min-w-100px">Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($schedule as $data)
        <tr>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data?->unit->no_pol }}</td>
            <td>{{ $data?->unit->type_unit }}</td>
            <td>{{ $data?->driver->nama_driver }}</td>
            <td>{{ $data?->customer->nama_customer }}</td>
            <td>{{ $data->muat }}</td>
            <td>{{ $data->bongkar }}</td>
            <td>{{ $data->note }}</td>
            <td>{{ $data->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>