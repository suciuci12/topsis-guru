<h2 style="text-align:center">
DATA KRITERIA
</h2>

<table border="1" width="100%" cellpadding="5" cellspacing="0">

<tr>
<th>Kode</th>
<th>Nama</th>
<th>Bobot</th>
<th>Tipe</th>
</tr>

@foreach($kriteria as $k)
<tr>
<td>{{ $k->kode }}</td>
<td>{{ $k->nama }}</td>

<!-- PENTING -->
<td>{{ number_format($k->bobot,2) }}</td>

<td>{{ ucfirst($k->tipe) }}</td>
</tr>
@endforeach

</table>
