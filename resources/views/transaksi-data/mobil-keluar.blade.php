@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detail Mobil Keluar</h1>
</div>


<div class="card mb-2">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary"></h6>
	</div>
	<div class="table-responsive p-3">
		<table class="table table-bordered" id="dataTable">
			<thead class="thead-light">
				<tr>
					<th>Aksi</th>
					<th>Nama Customer</th>
					<th>Email Customer</th>
					<th>No Polisi</th>
					<th>Nama Mobil</th>
					<th>Image</th>
					<th>Harga Sewa</th>
					<th>Status Transaksi</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $x)
				@if($x->transaksi_mobil->mobil->status==2)
				<tr>
					<td>
						<a href=""  data-bs-toggle="modal" data-bs-target="#detail-{{$x->id}}" class="text-white rounded-circle btn btn-info"><i class="bi bi-eye-fill"></i></a>
					</td>
					<td>{{$x->user->nama}}</td>	
					<td>{{$x->user->email}}</td>	
					<td>{{$x->transaksi_mobil->mobil->no_polisi}}</td>	
					<td>{{$x->transaksi_mobil->mobil->nama_mobil}}</td>	
					<td>
						<img src="{{url('image_mobil/'.$x->transaksi_mobil->mobil->image)}}" class="rounded float-start" alt="..." width="150px">
					</td>	
					<td>{{number_format($x->transaksi_mobil->mobil->harga)}}</td>	
					<td>
						@if($x->transaction_status=='settlement')
						<div class="badge bg-success text-white" style="width: 6rem;">
							<i class="bi bi-check2"></i>&nbsp;Lunas
						</div>
						@endif

					</td>	
					<td>{{number_format($x->gross_amount)}}</td>	
					
				</tr>
				@else
				<tr>
					<td colspan="9"><h5 class="text-center">Tidak ada data</h5></td>
				</tr>
				@endif
				@endforeach
				
			</tbody>
			
		</table>
	</div>
</div>

@foreach($data as $d)
<div class="modal fade" id="detail-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tr>
						<th>Kondisi</th>
						<th>Transmisi</th>
						<th>Lama Sewa</th>
						<th>Dari Tanggal</th>
						<th>Sampai Tanggal</th>
						<th>Dari Kota</th>
						<th>Ke Kota</th>
					</tr>

					<tr>
						<td>
							@if($d->transaksi_mobil->mobil->kondisi=='bersih')
							<div class="badge bg-success text-white" style="width: 6rem;">
								bersih
							</div>
							@elseif($d->transaksi_mobil->mobil->kondisi=='kotor')
							<div class="badge bg-danger text-white" style="width: 6rem;">
								kotor
							</div>
							@endif
						</td>
						<td>{{$d->transaksi_mobil->mobil->transmisi}}</td>	
						<td>{{$d->transaksi_mobil->lama_sewa}}&nbsp;Hari</td>	
						<td>{{$d->transaksi_mobil->dari_tanggal}}</td>	
						<td>{{$d->transaksi_mobil->sampai_tanggal}}</td>	
						<td>{{$d->transaksi_mobil->dari_kota}}</td>	
						<td>{{$d->transaksi_mobil->ke_kota}}</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
					Tutup
				</button>

			</div>
		</div>
	</div>
</div>
@endforeach

@endsection