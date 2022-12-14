@extends('layout.main')
@section('content')
@if($data->count())
@foreach($data->chunk(4) as $z)
 
<div class="row">
	@foreach($z as $x)
	
	<div class="col-xl-4 col-md-6 mb-4">
		<!-- small box -->
		<div class="card">
			<a href="{{url('/order/mobil/'.$x->id)}}">
				<img src="{{url('image_mobil/'.$x->image)}}" class="card-img-top" alt="...">
			</a>
			<div class="card-body">
				<h5 class="card-title">{{$x->nama_mobil}}</h5>
				@if($x->status==1)
				<div class="badge badge-success text-wrap" style="width: 6rem;">
					Tersedia
				</div>
				@elseif($x->status==2)
				<div class="badge badge-danger text-wrap" style="width: 6rem;">
					Disewa
				</div>
				@elseif($x->status==3)
				<div class="badge badge-success text-wrap" style="width: 6rem;">
			      Tersedia
				</div>
				@endif


				<!--kondisi mobil sudah di pakai-->
				@if($x->kondisi=='bersih')
				<div class="badge badge-info text-wrap" style="width: 6rem;">
					Bersih
				</div>
				@elseif($x->kondisi=='kotor')
				<div class="badge badge-danger text-wrap" style="width: 6rem;">
					Kotor
				</div>
				
				@endif
				<br>
				<h6 class="card-title mt-3">Rp{{number_format($x->harga)}}/Hari</h6>
				
				<hr>
				<div class="row">
					<div class="col-sm-5">
						<a href="{{url('/komentar/'.$x->id)}}" style="text-decoration: none;"><span><i class="bi bi-chat-right-dots"></i></span>
							Komentar&nbsp;<span><small></small></span>
						</a>
					</div>

					
				</div>
			</div>

		</div>
	</div>


	
	@endforeach
</div>
@endforeach
<p class="text-center">
{{ $data->links() }}
</p>
@else
<img src="{{url('template/img/car.png')}}" class="rounded mx-auto d-block" alt="..." 
style="max-width: 400px;">
<h5 align="center" style="margin-top: -120px;">Mobil belum tersedia</h5>
@endif

@endsection