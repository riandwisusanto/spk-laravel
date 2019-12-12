@extends('template_ds')
@section('contentWebsite')
<div class="well well-lg">
	<div class="container">
		<h2>Daftar RT</h2>
		<span>Halaman ini berisi daftar RT.</span>
	</div>
</div>
<div class="container">
	<table class="table table-bordered table-hover" width="1">
		<tr>
			<th>Nama</th>
			<th>No KTP</th>
			<th>Dari RT</th>
			<th>Keterangan</th>
		</tr>
		@foreach($data as $p)
		<tr>
			<td><b>{{$p->nama}}</b></td>
			<td>{{$p->no_ktp}}</td>
			<td>{{$p->dari_rt}}</td>
			<td width="230px">
				<ul class="list-inline">
					<li class="list-inline-item"><a href="{{route('index.dt', $p->id)}}">Lihat</a></li>
					<li class="list-inline-item"><a href="{{route('detil.rt', $p->id)}}">Detail</a></li>
					<li class="list-inline-item"><a href="#{{$p->id}}" data-target="#{{$p->id}}" data-toggle="modal">Ubah</a></li>
					<li class="list-inline-item"><form action="{{route('hapus.rt', $p->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form></li>
				</ul>
			</td>
		</tr>
		@endforeach
		<?php if(count($cek) > 0){ ?>
			<form action="{{route('cetak.data')}}" method="get">
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Cetak</button>
        	</form>
        <?php } else{ ?>
        	<form action="{{route('cetak.data')}}" method="get">
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary" disabled="disabled">Cetak</button>
        	</form>
		<?php } ?>
        <br>
        <br>
		@foreach($data as $p)
                <div class="modal fade" id="{{$p->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Data RT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('ubah.rt', $p->id)}}" method="post"
                              role='form'>
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="nama">Nama Lengkap : </label>
											<input required type="text" name="nama" class="form-control" value="{{$p->nama}}" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="nama">Dari RT : </label>
											<input required type="text" name="dari_rt" class="form-control"
											value="{{$p->dari_rt}}"
											>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="ktp">Nomor KTP : </label>
											<input required type="tel" pattern="[0-9]{16}" name="no_ktp" class="form-control"
											value="{{$p->no_ktp}}"
											>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="alamat">Alamat : </label>
											<textarea name="alamat" id="alamat" required class="form-control" rows="4">{{$p->alamat}}</textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="nama">Username : </label>
											<input required type="text" name="username" class="form-control"
											value="{{$p->username}}"
											>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="nama">Password : </label>
											<input required minlength="8" maxlength="16" type="text" name="password" class="form-control"
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
                            <!--  <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div> -->
                        </div>
                      </div>
                    </div>
              @endforeach
	</table>
</div>
@endsection
