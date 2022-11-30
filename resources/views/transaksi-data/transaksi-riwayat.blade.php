@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detail Riwayat Transkasi</h1>
</div>

@foreach($data as $x)
@if($x->user->id == Auth::user()->id)
<div class="card mt-5 shadow p-3 mb-5 bg-body rounded">
	<div class="card-body">
		<div class="row">
			<div class="col-md-1">
				<img class="img-profile rounded-circle" src="{{url('template/img/logo/bank1.png')}}" style="max-width: 70px; margin-top: -10px;">
			</div>
			<div class="col-md-0">
				<span>
					<p>Pembayaran</p>
				</span>
			</div>

			<div class="col">
				<span>
					<p style="float: right;">Rp.{{number_format($x->gross_amount)}}</p>
				</span>

			</div>
		</div>

		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-0">
				<span>
					<p>{{$x->transaction_time}}</p>
				</span>
			</div>
			<div class="col">
				<span>
					
					@if($x->transaction_status=='settlement')
					<div class="badge bg-success text-white" style="width: 6rem; float: right;">
						Berhasil
					</div>
					@endif
					
				</span>
			</div>
		</div>

		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-0">
				
			</div>
			<div class="col">
				<span>
					
					@if($x->transaksi_mobil->mobil->status==2)
					<div class="badge bg-danger text-white" style="width: 8rem; float: right;">
						Belum dikembalikan
					</div>
					@elseif($x->transaksi_mobil->mobil->status==3)
					<div class="badge bg-secondary text-white" style="width: 6rem; float: right;">
						Dikembalikan
					</div>
					@endif
					
				</span>
			</div>
		</div>

		<div class="row mt-3" style="float: right;">
			<div class="col-md-1">
			</div>
			<div class="col-md-0">
				<button type="button" class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#detail-{{$x->id}}" aria-expanded="false" aria-controls="collapseExample">Detail</button>
			</div>
			<div class="col">
				@if($x->transaksi_mobil->mobil->status==2)
				<button type="button" data-bs-toggle="modal" data-bs-target="#kembali-{{$x->id}}" class="btn btn-danger">Kembalikan</button>
				@elseif($x->transaksi_mobil->mobil->status==3)
				<button type="button" class="btn btn-secondary disabled">Dikembalikan</button>
				@endif
			</div>
		</div>

	</div>
	<div class="collapse" id="detail-{{$x->id}}">
		<div class="card card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Customer</th>
							<th>Email</th>
							<th>No Telepon</th>
							<th>No Polisi</th>
							<th>Mobil</th>
							<th>Jenis Mobil</th>
							<th>Merek Mobil</th>
							<th>Transmisi</th>
							<th>Image</th>
							<th>Lama Sewa</th>
							<th>Dari Tanggal</th>
							<th>Sampai Tanggal</th>
							<th>Dari Kota</th>
							<th>Ke Kota</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$x->transaksi_mobil->user->nama}}</td>
							<td>{{$x->transaksi_mobil->user->email}}</td>
							<td>{{$x->transaksi_mobil->user->no_tlp}}</td>
							<td>{{$x->transaksi_mobil->mobil->no_polisi}}</td>
							<td>{{$x->transaksi_mobil->mobil->nama_mobil}}</td>
							<td>{{$x->transaksi_mobil->mobil->merek->merek}}</td>
							<td>{{$x->transaksi_mobil->mobil->jenis->jenis_mobil}}</td>
							<td>{{$x->transaksi_mobil->mobil->transmisi}}</td>
							<td>
								<img src="{{url('image_mobil/'.$x->transaksi_mobil->mobil->image)}}" class="rounded float-start" alt="..." width="150px">
							</td>
							<td>{{$x->transaksi_mobil->lama_sewa}}Hari</td>
							<td>{{$x->transaksi_mobil->dari_tanggal}}</td>
							<td>{{$x->transaksi_mobil->sampai_tanggal}}</td>
							<td>{{$x->transaksi_mobil->dari_kota}}</td>
							<td>{{$x->transaksi_mobil->ke_kota}}</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endif
@endforeach
{{ $data->links() }}

@foreach($data as $k)
<div class="modal fade" id="kembali-{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Pengembalian</h5>
				
			</div>
			<form action="{{url('/konfirmasi/pengembalian/'.$k->transaksi_mobil->mobil->id)}}" method="post">

				<div class="modal-body">
					@csrf
					<input type="hidden" name="kondisi" value="kotor">
					<input type="hidden" name="status" value="3">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-danger">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

@endsection