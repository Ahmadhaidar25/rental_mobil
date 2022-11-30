@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Master Mobil</h1>
</div>


<div class="card mb-2">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary"></h6>
		<div class="btn-group" role="group" aria-label="Basic mixed styles example">
			
			<button type="button" class="btn btn-primary" 
			data-bs-toggle="modal" data-bs-target="#exampleModal">
			<i class="bi bi-plus-lg"></i>&nbsp;Tambah</button>
		</div>
	</div>
	<div class="table-responsive p-3">
		<table class="table align-items-center table-flush dataTable" id="dataTable">
			<thead class="thead-light">
				<tr>
					<th>Aksi</th>
					<th>No Polisi</th>
					<th>Nama Mobil</th>
					<th>Image</th>
					<th>Merek</th>
					<th>Jenis</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $x)
				<tr>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
							<a href="{{url('/detail/mobil/'.$x->id)}}" 
								class="text-white btn btn-info rounded-circle"><i class="bi bi-eye-fill"></i></a>
								&nbsp;
								<a href="{{url('/edit/mobil/'.$x->id)}}"class="text-white btn btn-warning rounded-circle">
									<i class="bi bi-pencil"></i>
								</a>
								&nbsp;
								<a href="{{url('/hapus/mobil/'.$x->id)}}" 
									class="text-white btn btn-danger rounded-circle btn2"><i class="bi bi-trash3-fill"></i></a>
								</div>
							</td>
							<td>{{$x->no_polisi}}</td>
							<td>{{$x->nama_mobil}}</td>
							<td><a href="" data-bs-toggle="modal" data-bs-target="#zoom-{{$x->id}}"><img src="{{url('image_mobil/'.$x->image)}}" class="rounded float-start" alt="..." width="150px"></a></td>
							<td>{{$x->merek->merek}}</td>
							<td>{{$x->jenis->jenis_mobil}}</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="{{url('/komentar/'.$x->id)}}" class="text-primary">
										<i class="bi bi-chat-right-text"></i>&nbsp;komentar</a>
										
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<!--Modal Tambah Data-->
			<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
						</div>
						<form class="form" action="{{url('/post/mobil')}}" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								@csrf
								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">No Polisi</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="no_polisi">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Nama Mobil</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama_mobil">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Image Mobil</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" name="image">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Merek Mobil</label>
									<div class="col-sm-10">
										<select class="form-select" id="merek" name="merek_id">
											<option value="" selected>--pilih--</option>
											@foreach($merek as $m)
											<option value="{{$m->id}}">{{$m->merek}}</option>
											@endforeach

										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Jenis Mobil</label>
									<div class="col-sm-10">
										<select class="form-select jenis" name="jenis_id">
											<option value="" selected>--pilih--</option>
											@foreach($jenis as $j)
											<option value="{{$j->id}}">{{$j->jenis_mobil}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label"> Kap Penumpang</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" placeholder="Kapasitas Penumpang" name="kapasitas_penumpang">
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Transmisi</label>
									<div class="col-sm-10">
										<select class="form-control" name="transmisi">
											<option value="" selected>--pilih--</option>
											<option value="manual">Manual</option>
											<option value="matic">Matic</option>
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">BBM</label>
									<div class="col-sm-10">
										<select class="form-control" name="bahan_bakar">
											<option value="" selected>--pilih--</option>
											<option value="bensin">Bensin</option>
											<option value="solar">Solar</option>
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-10">
										<select class="form-control" name="status">
											<option value="" selected>--pilih--</option>
											<option value="tersedia">Tersedia</option>
											<option value="tidak tersedia">Tidak Tersedia</option>
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Kondisi</label>
									<div class="col-sm-10">
										<select class="form-control" name="kondisi">
											<option value="" selected>--pilih--</option>
											<option value="bersih">Bersih</option>
											<option value="kotor">Kotor</option>
										</select>
									</div>
								</div>


								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Harga</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="Harga/12jam" name="harga">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<!--zoom image-->
			@foreach($data as $z)
			<div class="modal fade" id="zoom-{{$z->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Zoom Image</h5>
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
						</div>
						<div class="table-responsive">
							<div class="modal-body">
								<img src="{{url('image_mobil/'.$z->image)}}" class="rounded float-start" height="500px" width="100%">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@endsection