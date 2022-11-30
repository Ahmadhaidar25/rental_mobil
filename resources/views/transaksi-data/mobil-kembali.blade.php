@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Mobil Kembali</h1>
</div>


<div class="card mb-2">
	<div class="card-body">
		<div class="row mt-3">
			<div class="col-md-12" style="margin-bottom: 20px">
				<div class="row">
					<div class="col-md-2">
						<span>Pilih dari tanggal</span>
						<div class="input-group">
							<input type="text" class="form-control pickdate date_range_filter" name="" >
							<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					</div>
					<div class="col-md-2">
						<span>Sampai tanggal</span>
						<div class="input-group">
							<input type="text" class="form-control pickdate date_range_filter2" name="">
							<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive p-3">
				<table class="table align-items-center table-flush dataTable" id="mobil-kembali">
					<thead class="thead-light">
						<tr>
							<th>Aksi</th>
							<th>Nama Customer</th>
							<th>No Telepon</th>
							<th>Foto</th>
							<th>Mobil</th>
							<th>No Polisi</th>
							<th>Image</th>
							<th>Status</th>
							<th>Kondisi</th>
							<th>Dari Tanggal</th>
							<th>Sampai Tanggal</th>
							<th>Tanggal Kembali</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($data as $x)
						@if($x->transaksi_mobil->mobil->status == 3)
						<tr>
							<td>
								<a href="" data-bs-toggle="modal" data-bs-target="#kembali-{{$x->id}}" class="text-white btn btn-info rounded-circle">
									<i class="bi bi-eye-fill"></i>
								</a>
							</td>
							<td>{{$x->transaksi_mobil->user->nama}}</td>
							<td>{{$x->transaksi_mobil->user->no_tlp}}</td>
							<td>
								@if($x->transaksi_mobil->user->avatar==null)
								<img class="img-profile rounded-circle" 
								src="{{url('template/img/boy.png')}}" style="max-width: 100px">
								@else
								<img class="img-profile rounded-circle" 
								src="{{url('image_avatar/'.$x->transaksi_mobil->user->avatar)}}" style="max-width: 100px">
								@endif
							</td>
							<td>{{$x->transaksi_mobil->mobil->nama_mobil}}</td>
							<td>{{$x->transaksi_mobil->mobil->no_polisi}}</td>
							<td>
								<img src="{{url('image_mobil/'.$x->transaksi_mobil->mobil->image)}}" class="rounded float-start" alt="..." width="150px">
							</td>
							<td>
								@if($x->transaksi_mobil->mobil->status==3)
								<div class="badge bg-success text-white" style="width: 6rem;">
									Kembali
								</div>
								@endif
							</td>

							<td>
								@if($x->transaksi_mobil->mobil->kondisi=='kotor')
								<div class="badge bg-danger text-white" style="width: 6rem;">
									Kotor
								</div>
								@endif
							</td>
							<td>{{$x->transaksi_mobil->dari_tanggal}}</td>
							<td>{{$x->transaksi_mobil->sampai_tanggal}}</td>
							<td>{{$x->transaksi_mobil->mobil->updated_at->isoFormat('D MMMM Y')}}</td>
						</tr>
						@else
						
						@endif
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>



	@foreach($data as $k)
	<div class="modal fade" id="kembali-{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Merek Mobil</th>
								<th>Jenis Mobil</th>
								<th>Kapasitas</th>
								<th>Transmisi</th>
								<th>Bahan Bakar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>{{$k->transaksi_mobil->mobil->merek->merek}}</th>
								<td>{{$k->transaksi_mobil->mobil->jenis->jenis_mobil}}</td>
								<td>{{$k->transaksi_mobil->mobil->kapasitas_penumpang}}</td>
								<td>{{$k->transaksi_mobil->mobil->transmisi}}</td>
								<td>{{$k->transaksi_mobil->mobil->bahan_bakar}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>

				</div>
			</div>
		</div>
	</div>
	@endforeach



	@endsection