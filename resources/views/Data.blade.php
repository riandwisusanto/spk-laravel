@extends('template_ds')
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
			<th>Status</th>
			<th>Keterangan</th>
		</tr>
		@foreach($data as $p)
		<tr>
			<td><b>{{ $p->nama}}</b></td>
			<td>{{$p->no_ktp}}</td>
			<td>{{$p->pekerjaan}}</td>
			<td>{{$p->status}}</td>
			<td width="205px">
				<div class="btn-group">
					<li class="list-inline-item"><a href="#{{$p->id}}" data-target="#{{$p->id}}" data-toggle="modal">Detail</a></li>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
	<a href="{{route('ds.data')}}">Kembali</a>
	

</div>

			@foreach($data as $detil)
                <div class="modal fade" id="{{$detil->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Detail Data Warga</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('detail.data', $detil->id)}}" method="post"
                              role='form'>
                                {{csrf_field()}}
                                {{method_field('put')}}
                                </form>
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
                          </div>
                            <!--  <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div> -->
                        </div>
                      </div>
                    </div>
              @endforeach
@endsection