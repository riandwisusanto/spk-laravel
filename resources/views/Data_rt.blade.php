@extends('template_rt')
@section('contentWebsite')
<div class="well well-lg">
	<div class="container">
		<h2>Daftar Peserta Jamkesmas</h2>
		<span>Halaman ini berisi para peserta jamkesmas.</span>
	</div>
</div>
<div class="container">
	<table class="table table-bordered table-hover" width="1">
		<tr>
			<th>Nama</th>
			<th>Nomor KTP</th>
			<th>Pekerjaan</th>
			<th>Pendidikan</th>
			<th>Keterangan</th>
		</tr>
		@foreach($pendaftar as $p)
		<tr>
			<td><b>{{ $p->nama}}</b></td>
			<td>{{$p->no_ktp}}</td>
			<td>{{$p->pekerjaan}}</td>
			<td>{{$p->pendidikan}}</td>
			<td width="200px">
				<ul class="list-inline">
					<li class="list-inline-item"><a href="{{route('detil.data', $p->id)}}">Detail</a></li>
					@if($p->kirim != 'ya')
						<li class="list-inline-item"><a href="#{{$p->id}}" data-target="#{{$p->id}}" data-toggle="modal">Ubah</a></li>
						<li class="list-inline-item"><form action="{{route('hapus.data', $p->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form></li>	
					@endif
				</ul>
			</td>
		</tr>
		@endforeach

		@foreach($pendaftar as $p)
                <div class="modal fade" id="{{$p->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Data Warga</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('ubah.data', $p->id)}}" method="post"
                              role='form'>
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Nama Lengkap : </label>
							<input required type="text" name="nama" value="{{$p->nama}}" class="form-control"
							>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ktp">Nomor KTP : </label>
							<input name="no_ktp" required type="tel" pattern="[0-9]{16}" class="form-control"
							value="{{$p->no_ktp}}">
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
										@if($cb->pekerjaan === $p->pekerjaan){
										selected
									}
									@endif

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
										@if($cb->pendapatan === $p->pendapatan){
										selected
									}
									@endif
										>{{ $cb->pendapatan }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ktp">Jumlah Tanggungan : </label>
							<select class="form-control" name="jt">
							@foreach($combo as $cb)
								<option value="{{ $cb->tanggungan }}" 
									@if($cb->tanggungan === $p->jumlah_tanggungan){
										selected
									}
									@endif
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
										@if($cb->keadaan_rumah === $p->rumah){
										selected
									}
									@endif
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
										@if($cb->pendidikan === $p->pendidikan){
										selected
									}
									@endif
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
							<textarea required name="alamat" class="form-control" rows="4">{{$p->alamat}}</textarea>
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
                            <!--  <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div> -->
                        </div>
                      </div>
                    </div>
              @endforeach


	</table>
	<h5>!!! Teliti Data kembali sebelum mengirim, karena setelah data terkirim maka data tidak akan bisa dirubah atau dihapus !!! <br>
	-- untuk menghapus atau mengubah silahkan ke Kantor Desa langsung -- </h5>
	<form action="{{route('data.rt.kirim', $id)}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary" >Kirim Data</button>
    </form>
</div>
@endsection
