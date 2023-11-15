<table>
    <thead>
        <tr class="fw-bolder text-muted">
            <th class="w-25px">
                No
            </th>
            <th class="min-w-150px">Nama Driver</th>
            <th class="min-w-150px">Status Karyawan</th>
            <th class="min-w-150px">Tanggal Lahir</th>
            <th class="min-w-150px">Tempat Lahir</th>
            <th class="min-w-150px">Pendidikan</th>
            <th class="min-w-150px">Agama</th>
            <th class="min-w-150px">Nomor HP</th>
            <th class="min-w-150px">Nomor KTP</th>
            <th class="min-w-150px">Alamat</th>
            <th class="min-w-150px">Nama Kontak Darurat</th>
            <th class="min-w-150px">Nomor Kontak Darurat</th>
            <th class="min-w-150px">PIC</th>
            <th class="min-w-150px">No BPJS</th>
            <th class="min-w-150px">Kelas BPJS</th>
            <th class="min-w-150px">Tanggal BPJS</th>
            <th class="min-w-150px">No Vaksin</th>
            <th class="min-w-150px">Jenis Vaksin</th>
            <th class="min-w-150px">No SIM</th>
            <th class="min-w-150px">Masa Berlaku SIM</th>
            <th class="min-w-150px">Jenis SIM</th>
            <th class="min-w-150px">Tanggal Masuk</th>
            <th class="min-w-150px">Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($driver as $i => $data)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $data->users->name }}</td>
            <td>{{ $data->status_karyawan }}</td>
            <td>{{ $data->tanggal_lahir }}</td>
            <td>{{ $data->tempat_lahir }}</td>
            <td>{{ $data->pendidikan }}</td>
            <td>{{ $data->agama }}</td>
            <td>{{ $data->no_hp }}</td>
            <td>{{ $data->no_ktp }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->nama_kontak_darurat }}</td>
            <td>{{ $data->nomor_kontak_darurat }}</td>
            <td>{{ $data->pic }}</td>
            <td>{{ $data->no_bpjs }}</td>
            <td>{{ $data->kelas_bpjs }}</td>
            <td>{{ $data->tanggal_bpjs }}</td>
            <td>{{ $data->no_vaksin }}</td>
            <td>{{ $data->jenis_vaksin }}</td>
            <td>{{ $data->no_sim }}</td>
            <td>{{ $data->masa_berlaku_sim }}</td>
            <td>{{ $data->jenis_sim }}</td>
            <td>{{ $data->tanggal_masuk }}</td>
            <td>{{ $data->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>