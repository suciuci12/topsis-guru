<h3 style="text-align:center">
DATA GURU
</h3>

<table border="1" cellpadding="6" cellspacing="0" width="100%">

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIP</th>
    <th>Mapel</th>
    <th>Status</th>
    <th>Alamat</th>   <!-- ➕ TAMBAH INI -->
</tr>

@foreach($guru as $g)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $g->nama }}</td>

<td>{{ $g->nip }}</td>

<td>
@foreach($g->mapels as $m)
- {{ $m->nama_mapel }} <br>
@endforeach
</td>

<td>
{{ $g->status_sertifikasi == 'sudah' ? 'Tersertifikasi' : 'Belum' }}
</td>

<!-- ➕ KOLOM ALAMAT -->
<td>
{{ $g->alamat ?? '-' }}
</td>

</tr>

@endforeach

</table>
