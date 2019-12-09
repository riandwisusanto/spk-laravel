@extends('template_rt')
@section('contentWebsite')
<div class="container">
	<div class="alert alert-info">
		<i class="glyphicon glyphicon-info-sign"></i>
		Silahkan isi data berikut sesuai dengan data yang sebenar-benarnya
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Form Data Peserta
		</div>
		<div class="panel-body">
				@include('info') <br>
			<form method="post" action="{{route('tambah.data', $id)}}">
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
							<label for="ktp">Nomor KTP : </label>
							<input type="text" name="no_ktp" class="form-control"
							>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="pekerjaan">Pekerjaan Kepala Rumah Tangga : </label>
							<select class="form-control" name="pekerjaan">
								@foreach($combo as $cb)
									<option value="{{ $cb->pekerjaan }}"
										>{{ $cb->pekerjaan }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="pekerjaan">Pendapatan Perbulan : </label>
							<select class="form-control" name="pp">
							    @foreach($combo as $cb)
									<option value="{{ $cb->pendapatan }}"
										>{{ $cb->pendapatan }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ktp">Jumlah Tanggungan Kepala Rumah Tangga: </label>
							<select class="form-control" name="jt">
							@foreach($combo as $cb)
								<option value="{{ $cb->tanggungan }}" 
									>{{ $cb->tanggungan }}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ktp">Keadaan Rumah : </label>
							<select class="form-control" name="kr">
							    @foreach($combo as $cb)
									<option value="{{ $cb->keadaan_rumah }}"
										>{{ $cb->keadaan_rumah }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ktp">Pendidikan Terakhir Kepala Rumah Tangga : </label>
							<select class="form-control" name="pend">
							    @foreach($combo as $cb)
									<option value="{{ $cb->pendidikan }}"
										>{{ $cb->pendidikan }}</option>
								@endforeach
							</select>
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