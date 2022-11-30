@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Master Jenis Mobil</h1>
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
					<th>Jenis Mobil</th>
					<th>Created_at</th>
					<th>Updated_at</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $x)
				<tr>
					<td>{{$x->jenis_mobil}}</td>
					<td>{{$x->created_at}}</td>
					<td>{{$x->updated_at}}</td>
					<td>
						<a href="" class="text-white btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#edit-{{$x->id}}"><i class="bi bi-pencil"></i></a>
						<a href="{{url('/hapus/jenis/'.$x->id)}}" class="text-white btn btn-danger rounded-circle btn2"><i class="bi bi-trash3-fill"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!--Modal Tambah Data-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Mobil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/post/jenis')}}" method="POST">
				<div class="modal-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Jenis Mobil</label>
						<div class="col-sm-10">
							<div class="field_wrapper_jenis">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="jenis_mobil[]" placeholder="Contoh: Mini bus/Bus">
									<a class="btn btn-success" href="javascript:void(0);" id="add_button_jenis" title="Add field"><i class="bi bi-plus-lg"></i></a>
								</div>
							</div>
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



<!--Modal Edit Data-->
@foreach($data as $e)
<div class="modal fade" id="edit-{{$e->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Jenis</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/update/jenis/mobil/'.$e->id)}}" method="POST">
				<div class="modal-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Jenis Mobil</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="jenis_mobil" value="{{$e->jenis_mobil}}">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection