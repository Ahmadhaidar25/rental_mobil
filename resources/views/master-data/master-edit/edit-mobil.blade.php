@extends('layout.main')
@section('content')
<a href="{{url('/master/mobil')}}" class="btn btn-danger">Kembali</a>
<form action="{{url('/ubah/data/mobil/'.$edit->id)}}" method="post" enctype="multipart/form-data">
	
	<div class="row mt-3">
		<div class="col-sm-7">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Edit Mobil</h5>
					<hr>
					<div>
						@csrf
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">No Polisi</label>
							<input type="text" class="form-control" name="no_polisi" value="{{$edit->no_polisi}}">
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Nama Mobil</label>
							<input type="text" class="form-control" name="nama_mobil" name="nama_mobil" value="{{$edit->nama_mobil}}">
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Merek</label>
							<select class="form-control" id="merek-select" name="merek_id">
								<option value="{{$edit->merek->id}}" selected>{{$edit->merek->merek}}</option>
								@foreach($merek as $m)
								<option value="{{$m->id}}">{{$m->merek}}</option>
								@endforeach

							</select>
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Jenis</label>
							<select class="form-control jenis-select" name="jenis_id">
								<option value="{{$edit->jenis->id}}" selected>{{$edit->jenis->jenis_mobil}}</option>
								@foreach($jenis as $j)
								<option value="{{$j->id}}">{{$j->jenis_mobil}}</option>
								@endforeach
							</select>
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Kap Penumpang</label>
							<input type="number" class="form-control" name="kapasitas_penumpang" value="{{$edit->kapasitas_penumpang}}">
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Transmisi</label>
							<select class="form-control" name="transmisi">
								@if($edit->transmisi == 'manual')
								<option value="{{$edit->transmisi}}">{{$edit->transmisi}}</option>
								<option value="matic">Matic</option>
								@elseif($edit->transmisi == 'matic')
								<option value="{{$edit->transmisi}}">{{$edit->transmisi}}</option>
								<option value="manual">Manual</option>
								@endif

							</select>
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">BBM</label>
							<select class="form-control" name="bahan_bakar">
								@if($edit->bahan_bakar == 'bensin')
								<option value="{{$edit->bahan_bakar}}">{{$edit->bahan_bakar}}</option>
								<option value="solar">Solar</option>
								@elseif($edit->bahan_bakar == 'solar')
								<option value="{{$edit->bahan_bakar}}">{{$edit->bahan_bakar}}</option>
								<option value="bensin">Bensin</option>
								@endif
							</select>
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Status</label>
							<select class="form-control" name="status">
								@if($edit->status == 1)
								<option value="{{$edit->status}}">Tersedia</option>
								<option value="tidak tersedia">Tidak Tersedia</option>
								@elseif($edit->status == 2)
								<option value="{{$edit->status}}">Tidak Tersedia</option>
								<option value="tersedia">Tersedia</option>
								@elseif($edit->status == 3)
								<option value="{{$edit->status}}">Tersedia</option>
								<option value="tidak tersedia">Tidak Tersedia</option>
								@endif
							</select>
						</div>


						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Kondisi</label>
							<select class="form-control" name="kondisi">
								@if($edit->kondisi == 'bersih')
								<option value="{{$edit->kondisi}}">{{$edit->kondisi}}</option>
								<option value="kotor">Kotor</option>
								@elseif($edit->kondisi == 'kotor')
								<option value="{{$edit->kondisi}}">{{$edit->kondisi}}</option>
								<option value="bersih">Bersih</option>
								@endif
							</select>
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Harga</label>
							<input type="text" class="form-control" name="harga" value="{{$edit->harga}}">
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-5 mt-2">
			<div class="card">
				<div class="card-body">
					<img src="{{url('image_mobil/'.$edit->image)}}" class="rounded float-end" width="100%">
					<input type="file" class="form-control mt-3" name="image">
					<div class="btn-group mt-3">
						<a href="{{url('/master/mobil')}}" class="btn btn-danger">Batal</a>
						&nbsp;
						<button type="submit" class="btn btn-success">Ubah</button>

					</div>
				</div>
			</div>

		</div>
	</div>
</form>

@endsection