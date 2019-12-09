@extends('template_ds')
@section('contentWebsite')
<div class="well well-lg">
	<div class="container">
		<h2>Form Input Data RT</h2>
		<span>Halaman ini berisi form untuk pengisian RT.</span>
	</div>
</div>
<div class="container">
	<div class="alert alert-info">
		<i class="glyphicon glyphicon-info-sign"></i>
		Silahkan isi data berikut sesuai dengan data yang sebenar-benarnya
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Form Data RT
		</div>
		<div class="panel-body">
				@include('info') <br>
			<form method="post" action="{{route('tambah.rt')}}">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Nama Lengkap : </label>
							<input type="text" name="nama" class="form-control"
							>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Dari RT : </label>
							<input type="text" name="dari_rt" class="form-control"
							>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ktp">Nomor KTP : </label>
							<input type="text" name="no_ktp" class="form-control"
							>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="alamat">Alamat : </label>
							<textarea name="alamat" id="alamat" required class="form-control" rows="4"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Username : </label>
							<input type="text" name="username" class="form-control"
							>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Password : </label>
							<input type="text" name="password" class="form-control"
							>
						</div>
					</div>
				</div>
			<button type="submit" name="submit" class="btn btn-succes btn-lg">
				<i class="glyphicon glyphicon-send"></i>
				Simpan
			</button>
				<button type="reset" name="reset" class="btn btn-danger btn-lg">
					Reset
				</button>
			</form>
		</div>
	</div>
</div>
@endsection