@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Master Admin</h1>
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
					<th>Nama</th>
					<th>Email</th>
					<th>Avatar</th>
					<th>Role</th>
					<th>Ubah Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $x)
				<tr>
					
					<td>{{$x->nama}}</td>
					<td>{{$x->email}}</td>
					<td>
						@if($x->avatar==null)
						<img src="{{url('template/img/admin.png')}}" class="rounded float-start" alt="...">
						@else
						<img src="{{url('image_user/'.$x->avatar)}}" class="rounded float-start" alt="...">
						@endif
					</td>
					<td>
						@if($x->role==2)
						<div class="badge bg-warning text-white" style="width: 6rem;">
							Admin
						</div>
						@endif
					</td>
					
					<td>
						@if($x->status==1)
						<a href="" class="btn btn-success"  
						data-bs-toggle="modal" data-bs-target="#status-{{$x->id}}">Aktif</a>
						@else
						<a href="" class="btn btn-danger"  
						data-bs-toggle="modal" data-bs-target="#status-{{$x->id}}">Tidak Aktif</a>
						@endif
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
			</div>
			<form class="form" action="{{url('/post/admin')}}" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama">
							@error('nama')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
							@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<div class="input-group" id="show_hide_password">
								<input type="password" name='password' class="form-control @error('email') is-invalid @enderror" name="password" autocomplete="current-password">
								@error('password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
								<div class="input-group-append">
									<a href="" class="btn btn-success"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10">
							<select class="form-control @error('role') is-invalid @enderror" 
							name="role">
							<option value="2">Admin</option>
						</select>
						@error('role')
						<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>

				<div class="mb-3 row">
					<label class="col-sm-2 col-form-label">Status</label>
					<div class="col-sm-10">
						<select class="form-control @error('role') is-invalid @enderror" 
						name="status">
						<option value="1">Aktif</option>
					</select>
					@error('status')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
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

@foreach($data as $s)
<div class="modal fade" id="status-{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Perubahan Status</h5>
				
			</div>
			<form action="{{url('/ubah/status/'.$s->id)}}" method="post">
				<div class="modal-body">
					@csrf
					@if($s->status==1)
					<input type="hidden" name="status" value="0">
					@else
					<input type="hidden" name="status" value="1">
					@endif
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-danger">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

@endsection