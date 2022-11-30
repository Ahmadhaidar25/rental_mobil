<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bukti pembayaran</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
	<div style="background:#00B649; height: 300px; width: 100%;" class="rounded">
		<div class="container">
			<div class="card bg-white mt-5">
				<div class="card-body">
					<div class="text-center">
						<img src="{{('template/img/images/logo.png')}}" class="rounded">
					</div>
					<div class="text-muted mt-4">
						{{$cetak->transaction_time}}
					</div>
					<hr>
					
					<div class="form-check form-check-inline">
						<p>Transaksi berhasil !!</p>
					</div>
					<div class="card">
						<div class="card-body">
							<h5>TOTAL <span style="float: right;">Rp{{number_format($cetak->gross_amount)}}</span></h5>
						</div>
					</div>

					<p>Metode Pembayaran <span style="float: right;">{{$cetak->payment_type}}</span></p>

					<hr>
					<p><b>Detail Customer</b></p>

					<p>Nama <span style="float: right;">{{$cetak->user->nama}}</span></p>
					<p>Email <span style="float: right;">{{$cetak->user->email}}</span></p>
					<p>No Telepon <span style="float: right;">{{$cetak->user->no_tlp}}</span></p>
					<hr>
					<p><b>Detail Transaksi</b></p>

					<p>Nama Mobil <span style="float: right;">
						{{$cetak->transaksi_mobil->mobil->nama_mobil}}
					</span></p>

					<p>No Polisi <span style="float: right;">
						{{$cetak->transaksi_mobil->mobil->no_polisi}}
					</span></p>

					<p>Status <span class="badge bg-success text-white" 
						style="float: right; width: 6rem;">
						@if($cetak->transaction_status=='settlement')
						Lunas
						@endif
					</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

