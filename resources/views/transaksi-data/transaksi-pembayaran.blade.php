@extends('layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detail Transaksi Pembayaran</h1>
</div>


<div class="card mb-2">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary"></h6>
		
	</div>
	<div class="table-responsive p-3">
		<table class="table align-items-center table-flush dataTable" id="dataTable">
			<thead class="thead-light">
				<tr>
					<th>Aksi</th>
					<th>Nama Mobil</th>
					<th>Gross Amount</th>
					<th>Payment Type</th>
					<th>Transaction Time</th>
					<th>Transaction Status</th>
					<th>Bank</th>
					<th>Va Number</th>
					

				</tr>
			</thead>
			<tbody>
				@foreach($data as $x)
				@if($x->user->id == Auth::user()->id)
				<tr>
					<td>
						<a href="{{url('/cetak/bukti/pembayaran/'.$x->id)}}" class="btn btn-danger rounded-circle"><i class="bi bi-printer"></i></a>
					</td>
					<td>{{$x->user->nama}}</td>
					<td>{{$x->gross_amount}}</td>
					<td>{{$x->payment_type}}</td>
					<td>{{$x->transaction_time}}</td>
					<td>
						@if($x->transaction_status=='settlement')
						<div class="badge bg-success text-white" style="width: 6rem;">
							<i class="bi bi-check2"></i>&nbsp;Lunas
						</div>
						@endif

					</td>
					<td>{{$x->bank}}</td>
					<td>{{$x->va_number}}</td>
					
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection