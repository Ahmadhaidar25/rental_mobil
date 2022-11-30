@extends('layout.main')
@section('content')
@if(auth()->user()->role==2)
<a href="{{url('/master/mobil')}}" class="btn btn-danger">Kembali</a>
@elseif(auth()->user()->role==3)
<a href="{{url('/daftar/mobil')}}" class="btn btn-danger">Kembali</a>
@endif
<div class="modal-content mt-2">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">{{$komentar->nama_mobil}}</h5>
		
	</div>
	<div class="table-responsive">
		<div class="modal-body">
			@if($komentar->komentar()->count())
			@foreach($komentar->komentar()->where('parent',0)->orderBy('created_at','desc')->get() as $a )
			<div class="container">
				<div class="table-responsive">
					<div class="card mt-5">
						<div class="card-body">
							<h5 class="card-title">
								@if($a->user->avatar==null)
								<img class="img-profile rounded-circle" src="{{url('template/img/boy.png')}}" style="max-width: 40px">
								@else

								<img class="img-profile rounded-circle" 
								src="{{url('image_avatar/'.$a->user->avatar)}}" style="max-width: 40px">
								
								@endif

								{{$a->user->nama}}
							</h5>

							<p class="card-text">{{$a->komentar}}</p>
							@if($a->user->id == Auth::user()->id) 
							<a href="{{url('/hapus/komentar/'.$a->id)}}" class="card-link btn btn-danger hapus">Hapus</a>
							@endif
							<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#balas-{{$a->id}}" aria-expanded="false" aria-controls="collapseExample">
								balas
							</button>

							<div class="collapse mt-3" id="balas-{{$a->id}}">
								<div class="card card-body">
									<form action="{{url('/balas/komentar/caild1')}}" method="post">
										<div class="form-floating">
											@csrf
											<input type="hidden" name="mobil_id" value="{{$komentar->id}}">
											<input type="hidden" value="{{$a->id}}" name="parent">
											<textarea cols="40" class="form-control text-primary" name="komentar">{{$a->user->nama}},&nbsp;</textarea>
											<button type="submit" class="btn btn-success mt-2">Kirim</button>
											<a href="" class="btn btn-danger mt-2" data-bs-toggle="collapse" data-bs-target="#balas-{{$a->id}}" aria-expanded="false" aria-controls="collapseExample">Tutup</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					@foreach($a->cailds1()->orderBy('created_at','desc')->get() as $b)
					<!--card balas komentar caild1-->
					<div class="card mt-3" style="margin-left: 50px;">
						<div class="card-body">
							<h5 class="card-title">
								@if($b->user->avatar==null)
								<a href="" data-bs-toggle="modal" data-bs-target="#cailds1-{{$b->id}}">
									<img class="img-profile rounded-circle" src="{{url('template/img/boy.png')}}" style="max-width: 40px">
								</a>
								@else
								<a href="" data-bs-toggle="modal" data-bs-target="#cailds1-{{$b->id}}">
									<img class="img-profile rounded-circle" 
									src="{{url('image_avatar/'.$b->user->avatar)}}" style="max-width: 40px">
								</a>
								@endif
								{{$b->user->nama}}
							</h5>

							<p class="card-text">{{$b->komentar}}</p>
							@if($b->user->id == Auth::user()->id) 
							<a href="{{url('/hapus/komentar/'.$b->id)}}" class="card-link btn btn-danger hapus">Hapus</a>
							@endif
							<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#balas-{{$b->id}}" aria-expanded="false" aria-controls="collapseExample">
								balas
							</button>

							<div class="collapse mt-3" id="balas-{{$b->id}}">
								<div class="card card-body">
									<form action="{{url('/balas/komentar/caild2')}}" method="post">
										<div class="form-floating">
											@csrf
											<input type="hidden" name="mobil_id" value="{{$komentar->id}}">
											<input type="hidden" value="{{$b->id}}" name="parent">
											<textarea cols="40" class="form-control text-primary" name="komentar">{{$b->user->nama}},&nbsp;</textarea>
											<button type="submit" class="btn btn-success mt-2">Kirim</button>
											<a href="" class="btn btn-danger mt-2" data-bs-toggle="collapse" data-bs-target="#balas-{{$b->id}}" aria-expanded="false" aria-controls="collapseExample">Tutup</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!--card balas komentar caild2-->
					@foreach($b->cailds2()->orderBy('created_at','desc')->get() as $c)
					<div class="card mt-3" style="margin-left: 100px;">
						<div class="card-body">
							<h5 class="card-title">
								@if($b->user->avatar==null)
								<a href="" data-bs-toggle="modal" data-bs-target="#cailds2-{{$c->id}}">
									<img class="img-profile rounded-circle" src="{{url('template/img/boy.png')}}" style="max-width: 40px">
								</a>
								@else
								<a href="" data-bs-toggle="modal" data-bs-target="#cailds2-{{$c->id}}">
									<img class="img-profile rounded-circle" 
									src="{{url('image_avatar/'.$c->user->avatar)}}" style="max-width: 40px">
								</a>
								@endif
								{{$c->user->nama}}
							</h5>

							<p class="card-text">{{$c->komentar}}</p>
							@if($c->user->id == Auth::user()->id) 
							<a href="{{url('/hapus/komentar/'.$c->id)}}" class="card-link btn btn-danger hapus">Hapus</a>
							@endif


						</div>
					</div>
				</div>
			</div>

			@endforeach
			@endforeach
			@endforeach
			@else
			<img src="{{url('template/img/komentar.png')}}" class="rounded mx-auto d-block" alt="..." style="max-width: 500px;">
			<h5 align="center">Belum ada komentar</h5>
			<blockquote class="blockquote mb-0">
				<p align="center">Jadilah yang pertama berkomentar</p>

			</blockquote>
			@endif


		</div>
	</div>
	

	<form action="{{url('/kirim/komentar')}}" method="post">
		<div class="modal-footer">
			@if(auth()->user()->avatar==null)
			<img class="img-profile rounded-circle" 
			src="{{url('template/img/boy.png')}}" style="max-width: 40px">
			@else
			<img class="img-profile rounded-circle" 
			src="{{url('image_avatar/'.auth()->user()->avatar)}}" style="max-width: 40px">
			@endif
			@csrf
			<input type="hidden" name="mobil_id" value="{{$komentar->id}}">
			<input type="hidden" name="parent" value="0">
			<input type="text" name="komentar" placeholder="Tulis komentar anda.." class="form-control">

			<button type="submit" class="btn btn-success">Kirim</button>

		</div>
	</form>


</div>







@endsection