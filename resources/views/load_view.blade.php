<div class="well well-lg">
	<div class="container">
		<h2>Daftar Peserta Jamkesmas</h2>
		<span>Daftar Peserta Jamkesmas Desa Sobontoro</span>
	</div>
</div>
<br>
<br>
<div class="container">
	<table class="table table-bordered table-hover" width="1">
		<tr>
			<th><font size="1">Nama</font></th>
			<th><font size="1">Nomor KTP</font></th>
			<th><font size="1">Pekerjaan</font></th>
			<th><font size="1">Pendapatan</font></th>
			<th><font size="1">Jumlah Tanggungan</font></th>
			<th><font size="1">Kondisi Rumah</font></th>
			<th><font size="1">Pendidikan Terakhir</font></th>
			<th><font size="1">Alamat</font></th>
			<th><font size="1">Status</font></th>
		</tr>
		@foreach($data as $p)
		<tr>
			<td width="50"><font size="1">{{ $p->nama}}</font></td>
			<td width="40"><font size="1">{{$p->no_ktp}}</font></td>
			<td><font size="1">{{$p->pekerjaan}}</font></td>
			<td width="100"><font size="1">{{$p->pendapatan}}</font></td>
			<td><font size="1">{{$p->jumlah_tanggungan}}</font></td>
			<td width="30"><font size="1">{{$p->rumah}}</font></td>
			<td><font size="1">{{$p->pendidikan}}</font></td>
			<td width="100"><font size="1">{{$p->alamat}}</font></td>
			<td><font size="1">{{$p->status}}</font></td>
		</tr>
		@endforeach
	</table>
</div>