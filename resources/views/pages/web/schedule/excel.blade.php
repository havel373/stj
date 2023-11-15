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
            <td>{{ $data?->driver?->users?->name }}</td>
            <td>{{ $data?->customer->nama_customer }}</td>
            <td>{{ $data->muat }}</td>
            <td>{{ $data->bongkar }}</td>
            <td>{{ $data->note }}</td>
            @if($data->status == 0)
            <td>New</td>
            @elseif($data->status == 1)
            <td>Request Uang Jalan</td>
            @elseif($data->status == 2)
            <td>Ongoing</td>
            @elseif($data->status == 3)
            <td>Complete</td>
            @elseif($data->status == 4)
            <td>Cancel</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>