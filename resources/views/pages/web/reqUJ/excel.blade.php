<table>
    <thead>
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="min-w-150px">Tanggal</th>
                <th class="min-w-150px">Driver</th>
                <th class="min-w-150px">Unit</th>
                <th class="min-w-150px">Customer</th>
                <th class="min-w-150px">Posisi Unit</th>
                <th class="min-w-150px">Lokasi Muat</th>
                <th class="min-w-150px">Tujuan</th>
                <th class="min-w-150px">KM Awal</th>
                <th class="min-w-150px">KM Akhir</th>
                <th class="min-w-150px">Uang Jalan</th>
                <th class="min-w-150px">Sisa Uang Jalan Kemarin</th>
                <th class="min-w-150px">Total Uang Jalan</th>
            </tr>
        </thead>
    </thead>
    <tbody>
    @foreach($reqUJ as $data)
        <tr>
            <td>{{ $data->schedule?->tanggal }}</td>
            <td>{{ $data?->schedule?->driver?->users?->name }}</td>
            <td>{{ $data?->schedule?->unit?->no_pol }}</td>
            <td>{{ $data?->schedule?->customer->nama_customer }}</td>
            <td>{{ $data->posisi_unit }}</td>
            <td>{{ $data->lokasi_muat }}</td>
            <td>{{ $data->tujuan }}</td>
            <td>{{ $data->km_awal }}</td>
            <td>{{ $data->km_akhir}}</td>
            <td>{{ $data->uang_jalan}}</td>
            <td>{{ $data->sisa_uang_jalan_kemarin}}</td>
            <td>{{ $data->total_uang_jalan}}</td>
        </tr>
    @endforeach
    </tbody>
</table>