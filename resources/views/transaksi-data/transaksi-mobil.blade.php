@extends('layout.main')
@section('content')
@if($data->count())
@foreach($data as $x)
@if($x->user->id == Auth::user()->id )
<div class="card mb-3">
	<div class="row g-0">
		<div class="col-md-4">
			<img src="{{url('image_mobil/'.$x->mobil->image)}}" class="img-fluid rounded-start" alt="...">
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">{{$x->mobil->nama_mobil}}</h5>
				<p class="card-text">Rp.&nbsp;{{$x->total}}</p>
				<p class="card-text"><small class="text-muted">
					@if($x->status_transaksi==1)
					<a href="{{url('/batal/pembayaran/'.$x->id)}}" class="btn btn-danger btn3">Batal</a>
					<a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail-{{$x->id}}">Detail</a>
					@elseif($x->status_transaksi==2)
					<a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail-{{$x->id}}">Detail</a>
					@endif
					
					@if($x->status_transaksi==1)
					<a href="{{url('/payment/'.$x->id)}}" class="btn btn-success"><i class="bi bi-wallet2"></i>&nbsp;Pilih Pembayaran</a>
					@elseif($x->status_transaksi==2)
					<button type="button" class="btn btn-success"><i class="bi bi-check-lg"></i>&nbsp;Sudah Dibayar</button>
					@endif

				</small></p>
			</div>
		</div>
	</div>
</div>
@endif
@endforeach
{{ $data->links() }}
@else
<img src="{{url('template/img/pesanan.png')}}" class="rounded mx-auto d-block" alt="..." 
style="max-width: 348px;">
<h5 align="center" style="margin-top: -15px;">Belum ada pesanan</h5>
@endif

@foreach($data as $d)
<div class="modal fade" id="detail-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class=" table table-bordered">
						<thead class="bg-success text-white">
							<tr>
								<th>Nama Mobil</th>
								<th>Plat No</th>
								<th>Lama Sewa</th>
								<th>Total</th>
								<th>Dari Tanggal</th>
								<th>Sampai Tanggal</th>
								<th>Dari Kota</th>
								<th>Ke Kota</th>
								<th>Status</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>{{$d->mobil->nama_mobil}}</th>
								<th>{{$d->mobil->no_polisi}}</th>
								<td>{{$d->lama_sewa}}&nbsp;Hari</td>
								<td>{{$d->total}}</td>
								<td>{{$d->dari_tanggal}}</td>
								<th>{{$d->sampai_tanggal}}</th>
								<td>{{$d->dari_kota}}</td>
								<td>{{$d->ke_kota}}</td>
								<td>
									@if($d->status_transaksi==1)
									<div class="badge bg-danger text-white" style="width: 6rem;">
										Belum Dibayar
									</div>
									@else
									<div class="badge bg-success text-white" style="width: 6rem;">
										Sudah Dibayar
									</div>
									@endif
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
				
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection