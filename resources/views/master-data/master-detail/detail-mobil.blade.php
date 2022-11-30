@extends('layout.main')
@section('content')


<a href="{{url('/master/mobil')}}" class="btn btn-danger">Kembali</a>
<div class="row mt-3">
	<div class="col-sm-7">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Detail Mobil</h5>
				<hr>
				<div>
					@csrf
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">No Polisi</label>
						<input type="text" class="form-control" name="no_polisi" value="{{$detail->no_polisi}}" readonly>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama Mobil</label>
						<input type="text" class="form-control" name="nama_mobil" name="nama_mobil" value="{{$detail->nama_mobil}}" readonly>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Merek</label>
						<select class="form-control" name="merek_id" readonly>
							<option value="{{$detail->merek->id}}" selected>
								{{$detail->merek->merek}}
							</option>


						</select>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Jenis</label>
						<select class="form-control" readonly>
							<option value="{{$detail->jenis->id}}" selected>{{$detail->jenis->jenis_mobil}}</option>
						</select>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Kap Penumpang</label>
						<input type="number" class="form-control" name="kapasitas_penumpang" value="{{$detail->kapasitas_penumpang}}" readonly>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Transmisi</label>
						<select class="form-control" name="transmisi" readonly>
							<option value="{{$detail->transmisi}}">{{$detail->transmisi}}</option>
						</select>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">BBM</label>
						<select class="form-control" name="bahan_bakar" readonly>
							<option value="{{$detail->bahan_bakar}}">{{$detail->bahan_bakar}}</option>
						</select>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Status</label>
						<select class="form-control" name="status" readonly>
							<option value="{{$detail->status}}">
								@if($detail->status==1)
								Tersedia
								@elseif($detail->status==2)
								Disewa
								@elseif($detail->status==3)
								Tersedia
								@endif
							</option>
						</select>
					</div>


					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Kondisi</label>
						<select class="form-control" name="kondisi" readonly>
							<option value="{{$detail->kondisi}}">{{$detail->kondisi}}</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Harga</label>
						<input type="text" class="form-control" name="harga" value="{{$detail->harga}}" readonly>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-5 mt-2">
		<div class="card">
			<div class="card-body">
				<img src="{{url('image_mobil/'.$detail->image)}}" class="rounded float-end" width="100%">
				<div class="btn-group mt-3">
					


				</div>
			</div>
		</div>

	</div>
</div>


@endsection