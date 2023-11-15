<table>
    <thead>
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="w-25px">
                    No
                </th>
                <th class="min-w-150px">SPK</th>
                <th class="min-w-150px">Receh Di Jalan</th>
                <th class="min-w-150px">Parkir Resmi</th>
                <th class="min-w-150px">Parkir Liar</th>
                <th class="min-w-150px">Helper</th>
                <th class="min-w-150px">TKBM Muat</th>
                <th class="min-w-150px">TKBM Bongkar</th>
                <th class="min-w-150px">Cheker</th>
                <th class="min-w-150px">Forklift <small>(Konfrimasi dulu jika ada)</small></th>
                <th class="min-w-150px">Security</th>
                <th class="min-w-150px">Isi BBM / Solar</th>
                <th class="min-w-150px">Isi Saldo E Tol</th>
                <th class="min-w-150px">Total Pengeluaran</th>
                <th class="min-w-150px">Sisa Uang Jalan</th>
                <th class="min-w-150px">Sisa Uang Jalan Kemarin</th>
            </tr>
        </thead>
    </thead>
    <tbody>
    @foreach($laporanPerjalanan as $i => $data)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $data?->schedule?->no_spk }}</td>
            <td>{{ $data?->receh_di_jalan }}</td>
            <td>{{ $data?->parkir_resmi }}</td>
            <td>{{ $data?->parkir_liar }}</td>
            <td>{{ $data?->helper }}</td>
            <td>{{ $data?->tkbm_muat }}</td>
            <td>{{ $data?->tkbm_bongkar }}</td>
            <td>{{ $data?->cheker }}</td>
            <td>{{ $data?->forklift}}</td>
            <td>{{ $data?->security}}</td>
            <td>{{ $data?->bbm}}</td>
            <td>{{ $data?->etoll}}</td>
            <td>{{ $data?->total_pengeluaran}}</td>
            <td>{{$item->sisa_uang_jalan - $item->total_pengeluaran}}</td>
            <td>{{ $data?->sisa_uang_jalan_kemarin}}</td>
        </tr>
    @endforeach
    </tbody>
</table>