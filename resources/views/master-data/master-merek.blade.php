@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Master Merek Mobil</h1>
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
					<th>Merek</th>
					<th>Created_at</th>
					<th>Updated_at</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $x)
				<tr>
					<td>{{$x->merek}}</td>
					<td>{{$x->created_at}}</td>
					<td>{{$x->updated_at}}</td>
					<td>
						<a href="" class="text-white btn btn-warning rounded-circle" data-bs-toggle="modal" data-bs-target="#edit-{{$x->id}}"><i class="bi bi-pencil"></i></a>
						<a href="{{url('/hapus/merek/'.$x->id)}}" class="text-white 
							btn btn-danger rounded-circle btn2"><i class="bi bi-trash3-fill"></i></a>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Merek Mobil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/post/merek')}}" method="POST">
				<div class="modal-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Merek Mobil</label>
						<div class="col-sm-10">
							<div class="field_wrapper">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="merek[]" placeholder="Merek Mobil">
									<a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field"><i class="bi bi-plus-lg"></i></a>
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
				<h5 class="modal-title" id="exampleModalLabel">Edit Merek</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/update/merek/'.$e->id)}}" method="POST">
				<div class="modal-body">
					@csrf
					<div class="mb-3 row">
						<label class="col-sm-2 col-form-label">Merek</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="merek" value="{{$e->merek}}">
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