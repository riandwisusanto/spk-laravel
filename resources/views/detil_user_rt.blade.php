@extends('template_ds')
@section('contentWebsite')
<div class="well well-lg">
	<div class="container">
		<h2>Detail Data RT</h2>
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
			<td>Dari RT</td>
			<td width="1">:</td>
			<td>{{$detil->dari_rt}}</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td width="1">:</td>
			<td>{{$detil->alamat}}</td>
		</tr>
		<tr>
			<td>No KTP</td>
			<td width="1">:</td>
			<td>{{$detil->no_ktp}}</td>
		</tr>
		<tr>
			<td>Username</td>
			<td width="1">:</td>
			<td>{{$detil->username}}</td>
		</tr>
	</table>
	<a href="{{route('ds.data')}}">Kembali</a>
</div>
@endsection