@extends('layout.main')
@section('content')
<a href="{{url('/daftar/mobil')}}" class="btn btn-danger">Kembali</a>
<div class="card mb-3 mt-3">
	<div class="row g-0">
		<div class="col-md-4">
			<img src="{{url('image_mobil/'.$order->image)}}" class="img-fluid rounded-start" alt="...">
		</div>
		<div class="col-md-8">
			<form class="form" action="{{url('/sewa/sekarang/'.$order->id)}}" method="POST">
				<div class="table-responsive">
					
					<div class="card-body">
						@csrf
						<input type="hidden" name="mobil_id" value="{{$order->id}}">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">No Polisi</label>
									<input type="text" class="form-control" value="{{$order->no_polisi}}" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Nama Mobil</label>
									<input type="text" class="form-control" value="{{$order->nama_mobil}}" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Merek Mobil</label>
									<input type="text" class="form-control" value="{{$order->merek->merek}}" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Jenis Mobil</label>
									<input type="text" class="form-control" value="{{$order->jenis->jenis_mobil}}" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Kap Penumpang</label>
									<input type="text" class="form-control" value="{{$order->kapasitas_penumpang}}" readonly>
								</div>

								
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Lama Sewa<span class="text-danger">*</span></label>
									<input type="number" class="form-control" id="lama" name="lama_sewa">
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Dari Tanggal<span class="text-danger">*</span></label>
									<input type="date" class="form-control" name="dari_tanggal">
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label"><i class="bi bi-geo-alt"></i>&nbsp;Dari Kota<span class="text-danger">*</span></label>
									<select class="form-control" id="kota1-select" name="dari_kota">
										<option value="">--pilih--</option>
										@foreach ($data as $datas) 
										<option value="{{ $datas['nama'] }}">{{ $datas['nama'] }}</option>
										@endforeach
									</select>
								</div>


							</div>




							<div class="col-md-6">
								

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Transmisi</label>
									<input type="text" class="form-control" value="{{$order->transmisi}}" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">BBM</label>
									<input type="text" class="form-control" value="{{$order->bahan_bakar}}" readonly>
								</div>

								<input type="hidden" name="status" value="2">


								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Status</label>
									@if($order->status==1)
									<input type="text" class="form-control" value="Tersedia" readonly>
									@elseif($order->status==2)
									<input type="text" class="form-control" value="Disewa" readonly>
									@elseif($order->status==3)
									<input type="text" class="form-control" value="Tersedia" readonly>
									@endif
								</div>


								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Kondisi</label>
									<input type="text" class="form-control" value="{{$order->kondisi}}" readonly>
								</div>





								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Harga/24Jam</label>
									<input type="text" class="form-control" id="harga" 
									value="{{$order->harga}}" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Total</label>
									<input type="number" class="form-control" id="total" name="total" readonly>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Sampai Tanggal<span class="text-danger">*</span></label>
									<input type="date" class="form-control" name="sampai_tanggal" required>
								</div>

								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label"><i class="bi bi-geo-alt"></i>&nbsp;Ke Kota<span class="text-danger">*</span></label>
									<select class="form-control" name="ke_kota" id="kota2-select" required>
										<option value="" selected>--pilih--</option>
										@foreach ($data as $datas) 
										<option value="{{ $datas['nama'] }}" selected>{{ $datas['nama'] }}</option>
										@endforeach
									</select>
								</div>
								<input type="hidden" name="status_transaksi" value="1">

								<div class="btn-group" role="group" aria-label="Basic mixed styles example">
									<button type="submit" class="btn btn-success">
									Sewa sekarang</button>
								</div>
							</div>



						</div>

					</div>
				</div>
			</form>
		</div>

	</div>
</div>

<script>
	$(document).ready(function(){
		$("form").submit(function(e){
			e.preventDefault()
			var teks = $(".teks").val();
			if(teks !== ""){
				$.post('data.php', {data: teks}, function(response){
					$("#demo").html(response)
					$(".teks").val("")
					$(".teks").focus()
				})	
			}else{
				alert("tidak boleh kosong")
			}

		})
	})	
</script>
@endsection