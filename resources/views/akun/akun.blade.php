@extends('layout.main')
@section('content')
<section style="background-color: #eee;">
	<div class="container py-5">

		<div class="row">
			<div class="col-lg-4">
				<div class="card mb-4">
					<div class="card-body text-center">
						@if(Auth::user()->avatar==null) 
						<img src="{{url('template/img/boy.png')}}" alt="avatar"
						class="rounded-circle img-fluid" style="width: 150px;">
						@else
						<img src="{{url('image_avatar/'.auth()->user()->avatar)}}" alt="avatar"
						class="rounded-circle img-fluid" style="width: 150px;">
						@endif

						<h5 class="my-3">{{Auth::user()->nama}}</h5>

						<form action="{{url('/ubah/foto')}}" method="POST" 
						enctype="multipart/form-data">
						@csrf
						<input type="file" class="form-control" name="avatar">
						<div class="btn-group mt-2" role="group" style="float: right;">
							<button type="button" class="btn btn-danger">Batal</button>
							<button type="submit" class="btn btn-success">Ubah</button>
						</div>
					</form>


				</div>
			</div>
			@if(Auth::user()->role==3)
			<div class="card mb-4">
				<div class="card-body text-center">
					@if($get->foto_ktp==null) 
					<img src="{{url('template/img/ktp/ktp.png')}}" alt="avatar"
					class="img-fluid">
					<p>Ktp belum di upload</p>
					@else
					<img src="{{url('image_ktp/'.$get->foto_ktp)}}" alt="avatar"
					class="img-fluid">
					@endif

				</div>
			</div>

			<div class="card mb-4">
				<div class="card-body text-center">
					@if($get->foto_sim==null) 
					<img src="{{url('template/img/sim/sim.png')}}" alt="avatar"
					class="img-fluid">
					<p>Sim belum di upload</p>
					@else
					<img src="{{url('image_sim/'.$get->foto_sim)}}" alt="avatar"
					class="img-fluid">
					@endif

				</div>
			</div>
			@endif
		</div>

		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a data-toggle="tab" class="nav-link active" href="#bio">Biodata</a>
						</li>
						<li class="nav-item">
							<a data-toggle="tab"  class="nav-link" href="#reset">Ubah Password</a>
						</li>

					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<div id="bio" class="tab-pane active">


							@if(auth()->user()->role==1)
							<!--form untuk super admin-->
							<form action="{{url('/update/profil/')}}" method="post" enctype="multipart/form-data">
								@csrf
								
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Nama Lengkap</p>
									</div>
									<div class="col-sm-9">
										<input type="text" name="nama" class="form-control" 
										value="{{$get->nama}}">
										
									</div>
								</div>
								
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Email</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0">{{Auth::user()->email}}</p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Status</p>
									</div>
									<div class="col-sm-9">

										@if(auth()->user()->status==1)
										<p class="badge bg-success text-wrap text-white" style="width: 6rem;">Aktif </p>
										@else
										<p class="badge bg-danger text-wrap text-white" style="width: 6rem;">Ofline</p>
										@endif

									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Role</p>
									</div>
									<div class="col-sm-9">
										@if(auth()->user()->role==1)
										<p class="badge bg-secondary text-wrap text-white" style="width: 6rem;">Super Admin</p>
										@elseif(auth()->user()->role==2)
										<p class="badge bg-warning text-wrap text-white" style="width: 6rem;">Admin</p>

										@elseif(auth()->user()->role==3)
										<p class="badge bg-success text-wrap text-white" style="width: 6rem;">Customer</p>
										@endif
									</div>
								</div>
								<hr>
								
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">No Telepon</p>
									</div>
									<div class="col-sm-9">
										@if($get->no_tlp==null)
										<input type="text" name="no_tlp" class="form-control">
										@else
										<input type="text" name="no_tlp" class="form-control" value="{{$get->no_tlp}}">
										@endif
									</div>
								</div>
								
								<hr>
								
								<div class="btn-group" role="group" style="float: right;">
									<button type="button" class="btn btn-danger">Batal</button>
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>	
							</form>
							@endif
							

							<!--form untuk admin-->
							@if(auth()->user()->role==2)
							<form action="{{url('/update/profil/')}}" method="post" enctype="multipart/form-data">
								@csrf
								
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Nama Lengkap</p>
									</div>
									<div class="col-sm-9">
										<input type="text" name="nama" class="form-control" 
										value="{{$get->nama}}">
										
									</div>
								</div>
								
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Email</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0">{{Auth::user()->email}}</p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Status</p>
									</div>
									<div class="col-sm-9">

										@if(auth()->user()->status==1)
										<p class="badge bg-success text-wrap text-white" style="width: 6rem;">Aktif </p>
										@else
										<p class="badge bg-danger text-wrap text-white" style="width: 6rem;">Ofline</p>
										@endif

									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Role</p>
									</div>
									<div class="col-sm-9">
										@if(auth()->user()->role==1)
										<p class="badge bg-secondary text-wrap text-white" style="width: 6rem;">Super Admin</p>
										@elseif(auth()->user()->role==2)
										<p class="badge bg-warning text-wrap text-white" style="width: 6rem;">Admin</p>

										@elseif(auth()->user()->role==3)
										<p class="badge bg-success text-wrap text-white" style="width: 6rem;">Customer</p>
										@endif
									</div>
								</div>
								<hr>
								
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">No Telepon</p>
									</div>
									<div class="col-sm-9">
										@if($get->no_tlp==null)
										<input type="text" name="no_tlp" class="form-control">
										@else
										<input type="text" name="no_tlp" class="form-control" value="{{$get->no_tlp}}">
										@endif
									</div>
								</div>
								
								<hr>
								
								<div class="btn-group" role="group" style="float: right;">
									<button type="button" class="btn btn-danger">Batal</button>
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>	
							</form>
							@endif




							<!--form untuk user customer-->
							@if(Auth::user()->role==3)
							<form action="{{url('/update/profil/')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Nama Lengkap</p>
									</div>
									<div class="col-sm-9">
										<input type="text" name="nama" class="form-control" 
										value="{{$get->nama}}">
										
									</div>
								</div>
								
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Email</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0">{{Auth::user()->email}}</p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Status</p>
									</div>
									<div class="col-sm-9">

										@if(auth()->user()->status==1)
										<p class="badge bg-success text-wrap text-white" style="width: 6rem;">Aktif </p>
										@else
										<p class="badge bg-danger text-wrap text-white" style="width: 6rem;">Ofline</p>
										@endif

									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Role</p>
									</div>
									<div class="col-sm-9">
										@if(auth()->user()->role==1)
										<p class="badge bg-secondary text-wrap text-white" style="width: 6rem;">Super Admin</p>
										@elseif(auth()->user()->role==2)
										<p class="badge bg-warning text-wrap text-white" style="width: 6rem;">Admin</p>

										@elseif(auth()->user()->role==3)
										<p class="badge bg-success text-wrap text-white" style="width: 6rem;">Customer</p>
										@endif
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">No Telepon</p>
									</div>
									<div class="col-sm-9">
										@if($get->no_tlp==null)
										<input type="text" name="no_tlp" class="form-control">
										@else
										<input type="text" name="no_tlp" class="form-control" value="{{$get->no_tlp}}">
										@endif
									</div>
								</div>
								
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">No Ktp</p>
									</div>
									<div class="col-sm-9">
										@if($get->no_ktp==null)
										<input type="text" name="no_ktp" class="form-control">
										@else
										<input type="text" name="no_ktp" class="form-control" value="{{$get->no_ktp}}">
										@endif
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Upload Ktp</p>
									</div>
									<div class="col-sm-9">
										@if($get->foto_ktp==null)
										<input type="file" name="foto_ktp" class="form-control">
										@else
										<input type="file" name="foto_ktp" class="form-control">
										@endif
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Upload Sim</p>
									</div>
									<div class="col-sm-9">
										@if($get->foto_sim==null)
										<input type="file" name="foto_sim" class="form-control">
										@else
										<input type="file" name="foto_sim" class="form-control">
										@endif
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Tempat Lahir</p>
									</div>
									<div class="col-sm-9">
										<select class="form-control" id="kota1-select" 
										name="tempat_lahir">
										@if($get->tempat_lahir==null)
										<option value="" selected>Pilih</option>
										@foreach($data as $x)
										<option value="{{$x['text']}}">{{$x['text']}}</option>
										@endforeach

										@else
										<option value="{{$get->tempat_lahir}}" selected>
											{{$get->tempat_lahir}}
										</option>
										@foreach($data as $x)
										<option value="{{$x['text']}}">{{$x['text']}}</option>
										@endforeach

										@endif

									</select>
								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Tanggal Lahir</p>
								</div>
								<div class="col-sm-9">
									@if($get->tgl_lahir==null)
									<input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir">
									@else
									<input type="text" name="tgl_lahir" class="form-control" 
									value="{{$get->tgl_lahir}}" id="tgl_lahir" value="{{$get->tgl_lahir}}">
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Umur</p>
								</div>
								<div class="col-sm-9">
									@if($get->umur==null)
									<input type="text" name="umur" class="form-control" id="umur" readonly>
									@else
									<input type="text" name="umur" class="form-control" 
									value="{{$get->umur}}" id="umur" readonly>
									@endif

								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Gander</p>
								</div>
								<div class="col-sm-9">
									@if($get->gander==null)
									<select class="form-control"name="gander">
										<option value="" selected>--pilih--</option>
										<option value="laki-laki">Laki-Laki</option>
										<option value="perempuan">Perempuan</option>
									</select>
									@else
									<input type="text" name="gander" class="form-control" 
									value="{{$get->gander}}" readonly>
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Alamat</p>
								</div>
								<div class="col-sm-9">
									@if($get->alamat==null)
									<textarea class="form-control" name="alamat"></textarea>
									@else
									<textarea class="form-control" name="alamat">{{$get->alamat}}</textarea>
									@endif
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Pekerjaan</p>
								</div>
								<div class="col-sm-9">
									@if($get->pekerjaan==null)
									<input type="text" name="pekerjaan" class="form-control">
									@else
									<input type="text" name="pekerjaan" class="form-control" 
									value="{{$get->pekerjaan}}">
									@endif
								</div>
							</div>
							
							<hr>
							
							<div class="btn-group" role="group" style="float: right;">
								<button type="button" class="btn btn-danger">Batal</button>
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
							
						</form>
						@endif








					</div>

					<!--ubah password-->
					<div id="reset" class="tab-pane fade">

						<form action="{{url('/ubah/password')}}" method="post" class="form">
							@method("put")
							@csrf
							<div class="mb-3">
								<label for="current_password" class="form-label">Password Lama</label>
								<input type="password" class="form-control @error('current_password') is-invalid @enderror" 
								name="current_password" id="current_password">

								@error('current_password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Password Baru</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" 
								name="password" id="password">

								@error('password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="password_confirmation" class="form-label">Konfirmasi Password</label>
								<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
								name="password_confirmation" id="password_confirmation">

								@error('password_confirmation')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>


							<div class="d-grid gap-2 d-md-block" style="float: right;">
								<button type="reset" class="btn btn-danger">Batal</button>
								<button type="submit" class="btn btn-success text-white" type="button">
									<div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i></div>
									<div class="hide-text">Ubah</div>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</section>
@endsection