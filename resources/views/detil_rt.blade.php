@extends('template_rt')
@section('contentWebsite')
<div class="well well-lg">
	<div class="container">
		<h2>Detail Data Peserta</h2>
		<span>Detail untuk <b>{{$detil->nama}}</b></span>
	</div>
</div>
<div class="container">
	<table class="well table table-bordered">
		<tr>
			<td width="200">Nama</td>
			<td width="1">:</td>
			<td>{{$detil->nama}}</td>
		</tr>
		<tr>
			<td>No KTP</td>
			<td width="1">:</td>
			<td>{{$detil->no_ktp}}</td>
		</tr>
		<tr>
			<td>Pendapatan Kepala Rumah Tangga</td>
			<td width="1">:</td>
			<td>{{$detil->pendapatan}}</td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td width="1">:</td>
			<td>{{$detil->pekerjaan}}</td>
		</tr>
		<tr>
			<td>Jumlah Tanggungan Kepala Rumah Tangga</td>
			<td width="1">:</td>
			<td>{{$detil->jumlah_tanggungan}}</td>
		</tr>
		<tr>
			<td>Kondisi Rumah</td>
			<td width="1">:</td>
			<td>{{$detil->rumah}}</td>
		</tr>
		<tr>
			<td>Pendidikan Terakhir Kepala Rumah Tangga</td>
			<td width="1">:</td>
			<td>{{$detil->pendidikan}}</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td width="1">:</td>
			<td>{{$detil->alamat}}</td>
		</tr>
	</table>
	<a href="{{route('data.rt', $id)}}">Kembali</a>
</div>
@endsection