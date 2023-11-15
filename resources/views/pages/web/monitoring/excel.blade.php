<table>
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="min-w-150px">Tanggal</th>
                <th class="min-w-125px">No SPK</th>
                @foreach($status as $i => $val)
                    @if ($i === 1)
                        <th class="min-w-125px">No DO</th>
                    @endif
                    <th class="min-w-125px">{{ucfirst($val->nama_status)}}</th>
                @endforeach
                <th>Nomor Invoice</th>
            </tr>
        </thead>
    <tbody>
        @foreach($collection as $item)
        <tr>
            <td>{{ $item?->schedule?->tanggal }}</td>
            <td>{{ $item?->schedule?->no_spk }}</td>
            @foreach($status as $i => $val)
            @php
                $statusDetail = collect($item->details)->filter(function($detail) use($val) {
                    return $detail->master_status == $val->id;
                })->sortByDesc('created_at')
                ->first(); 
            @endphp
                @if ($i === 1)
                    <td>{{$item->nomor_do}}</td>
                @endif
            <td>
                @if($statusDetail?->status == 'menunggu' )
                        Waiting
                @endif
                @if($statusDetail?->status == 'diterima' )
                        Done
                @endif
                @if($statusDetail?->status == 'ditolak' )
                        Reject
                @endif
            </td>
            @endforeach
            <td>{{ $item->nomor_invoice }}</td>
        </tr>
    @endforeach
    </tbody>
</table>