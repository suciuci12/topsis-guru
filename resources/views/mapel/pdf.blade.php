<!DOCTYPE html>
<html>
<head>
<title>Cetak Mapel</title>

<style>
body{
    font-family: Arial;
    font-size: 12px;
}

table{
    width: 100%;
    border-collapse: collapse;
}

th,td{
    border: 1px solid #000;
    padding: 6px;
}

th{
    background: #eee;
}
</style>

</head>

<body>

<h3 align="center">
DATA MATA PELAJARAN  
SMK CITRA NEGARA
</h3>

<table>

<tr>
<th>No</th>
<th>Nama Mapel</th>
<th>Kode</th>
</tr>

@foreach($mapel as $i=>$m)

<tr>
<td>{{ $i+1 }}</td>
<td>{{ $m->nama_mapel }}</td>
<td>{{ $m->kode }}</td>
</tr>

@endforeach

</table>

</body>
</html>
