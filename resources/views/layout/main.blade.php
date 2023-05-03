<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="{{url('template/img/images/logo.png')}}" rel="icon">
	<title>Buroq Transport&nbsp;|&nbsp;Apps</title>
	<link href="{{url('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('template/css/ruang-admin.min.css')}}" rel="stylesheet">
	<link href="{{url('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<style>
		.preloader {

			position: fixed;

			top: 0;

			left: 0;

			width: 100%;

			height: 100%;

			z-index: 9999;

			background-color: #fff;

		}

		.preloader .loading {

			position: absolute;

			left: 50%;

			top: 50%;

			transform: translate(-50%, -50%);

			font: 14px arial;

		}


		.spinner {
			display: none;
		}

		#container {
			height: 400px;
		}

		.highcharts-figure,
		.highcharts-data-table table {
			min-width: 320px;
			max-width: 800px;
			margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}
		


	</style>

</head>

<body id="page-top">
	<div class="preloader">

		<div class="loading">
			
			<img src="{{url('template/img/images/logo.png')}}" alt="" class="img-fluid" style="width: 80px;">
			<div class="text-center mt-2">
				<div class="spinner-border" role="status">
				</div>
			</div>
		</div>
	</div>
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="index.html">
				<div class="sidebar-brand-icon">
					<img src="{{url('template/img/images/logo.png')}}">
				</div>

			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="{{url('home')}}">
					<i class="fas fa-fw fa-home"></i>
					<span>Home</span></a>
				</li>
				<hr class="sidebar-divider">

				@if(auth()->user()->role== 2)
				<!--menu admin-->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
					aria-expanded="true" aria-controls="collapseBootstrap">
					<i class="bi bi-server text-primary"></i>
					<span>Master Data</span>
				</a>
				<div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">

						
						<a class="collapse-item" href="{{url('/master/merek')}}">Master Merek</a>
						<a class="collapse-item" href="{{url('/master/jenis')}}">Master Jenis</a>
						<a class="collapse-item" href="{{url('/master/mobil')}}">Master Mobil</a>
						
					</div>
				</div>

				<a class="nav-link" href="{{url('/mobil/pendding')}}">
					<i class="fas fa-fw fa-car text-warning"></i>
					<span>Mobil Pendding</span>
				</a>

				<a class="nav-link" href="{{url('/mobil/keluar')}}">
					<i class="fas fa-fw fa-car text-danger"></i>
					<span>Mobil Keluar</span>
				</a>

				<a class="nav-link" href="{{url('/mobil/kembali')}}">
					<i class="fas fa-fw fa-car text-info"></i>
					<span>Mobil Kembali</span>
				</a>

				<a class="nav-link" href="{{url('/akun/anda')}}">
					<i class="bi bi-person-fill text-primary"></i>
					<span>Akun Anda</span>
				</a>

			</li>
			@endif


			@if(auth()->user()->role== 1)
			<!--menu super admin-->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
				aria-expanded="true" aria-controls="collapseBootstrap">
				<i class="bi bi-server text-primary"></i>
				<span>Master Data</span>
			</a>
			<div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="{{url('/master/admin')}}">Master Admin</a>
				</div>
			</div>

			<a class="nav-link" href="{{url('/akun/anda')}}">
				<i class="bi bi-person-fill text-primary"></i>
				<span>Akun Anda</span>
			</a>
		</li>
		@endif

		@if(auth()->user()->role==3)
		<div class="sidebar-heading">
			Menu Customer
		</div>

		<li class="nav-item">
			<a class="nav-link" href="{{url('/daftar/mobil')}}">
				<i class="fas fa-fw fa-car text-info"></i>
				<span>Daftar Mobil</span>
			</a>

			<a class="nav-link" href="{{url('/pesanan/saya')}}">
				<i class="bi bi-box-seam"></i>
				<span>Pesanan Saya</span>
			</a>

			<a class="nav-link" href="{{url('/transaksi/pembayaran')}}">
				<i class="bi bi-currency-dollar text-warning"></i>
				<span>Riwayat Pembayaran</span>
			</a>

			<a class="nav-link" href="{{url('/riwayat/transaksi')}}">
				<i class="bi bi-repeat text-secondary"></i>
				<span>Riwayat Transaksi</span>
			</a>

			<a class="nav-link" href="{{url('/akun/anda')}}">
				<i class="bi bi-person-fill text-primary"></i>
				<span>Akun Anda</span>
			</a>
		</li>
		@endif
	</li>

	<hr class="sidebar-divider">
	<div class="version">Version.0.1</div>
</ul>
<!-- Sidebar -->
<div id="content-wrapper" class="d-flex flex-column">
	<div id="content">
		<!-- TopBar -->
		<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" style="background: #00B649;">
			<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>
			<ul class="navbar-nav ml-auto">



			</ul>
			<ul class="navbar-nav">
				<div class="topbar-divider d-none d-sm-block"></div>
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					@if(auth()->user()->avatar==null)
					<img class="img-profile rounded-circle" src="{{url('template/img/boy.png')}}" style="max-width: 60px">
					@else
					<img class="img-profile rounded-circle" 
					src="{{url('image_avatar/'.auth()->user()->avatar)}}" style="max-width: 60px">
					@endif
					<span class="ml-2 d-none d-lg-inline text-white small">{{auth()->user()->nama}}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					
					<a class="dropdown-item btn1" href="{{url('logout')}}">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						Keluar
					</a>
				</div>
			</li>
		</ul>
	</nav>
	<!-- Topbar -->

	<!-- Container Fluid-->
	<div class="container-fluid" id="container-wrapper">
		@yield('content')
	</div>
	<!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - 
				<b><a href="" target="_blank">Ahmad Haidar</a></b>
			</span>
		</div>
	</div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{url('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('template/js/ruang-admin.min.js')}}"></script> 
<script src="{{url('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script type="text/javascript"src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-c4LezjG3wumTmTYW"></script>

<script>

	$(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });

	$(document).ready(function() {
		var table = $('#mobil-kembali').DataTable({
			
		});
		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
				var min = $('.date_range_filter').val();
				var max = $('.date_range_filter2').val();
				var dari_tgl = data[9];  
				var sampai_tgl = data[10];
				if (
					(min == "" || max == "") ||
					(moment(dari_tgl).isSameOrAfter(min) && moment(sampai_tgl).isSameOrBefore(max))
					) {
					return true;
			}
			return false;
		}
		);
		$('.pickdate').each(function() {
			$(this).datepicker({format: 'mm/dd/yyyy'});
		});
		$('.pickdate').change(function() {
			table.draw();
		});		
	});


	$(document).ready(function () {
		$(".preloader").fadeOut(1000);

	})

	$(".btn1").click(function(e){
		e.preventDefault();
		var logout = $(this).attr('href');
		Swal.fire({
			title: 'Yakin',
			text: "Akan keluar dari aplikasi",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = logout;
			}
		})
	})

	$(".btn2").click(function(e){
		e.preventDefault();
		var hapus = $(this).attr('href');
		Swal.fire({
			title: 'Yakin',
			text: "Data akan dihapus",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = hapus;
			}
		})
	})

	$(".btn3").click(function(e){
		e.preventDefault();
		var batal = $(this).attr('href');
		Swal.fire({
			title: 'Yakin',
			text: "Akan membatalkan pesanan",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = batal;
			}
		})
	})

	$(".hapus").click(function(e){
		e.preventDefault();
		var hapus = $(this).attr('href');
		Swal.fire({
			title: 'Yakin',
			text: "Komentar akan di hapus",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = hapus;
			}
		})
	})

	$(".jenis").select2({
		theme: 'bootstrap4',
		placeholder: "Please Select",
		dropdownParent: $("#exampleModal")
	});

	$("#merek").select2({
		theme: 'bootstrap4',
		placeholder: "Please Select",
		dropdownParent: $("#exampleModal")
	});



	$(".jenis-select").select2({
		theme: 'bootstrap4',
		
		
	});

	$("#merek-select").select2({
		theme: 'bootstrap4',

		
	});

	$("#kota1-select").select2({
		theme: 'bootstrap4',
		
	});

	$("#kota2-select").select2({
		theme: 'bootstrap4',
		
	});
	

	$(function() {
		$( "#tgl_lahir" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});

	window.onload=function(){

		$('#tgl_lahir').on('change', function() {
			var dob = new Date(this.value);
			var today = new Date();
			var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
			$('#umur').val(age);

		});

	}
	
	$(document).ready(function() {
		$("#lama, #harga").keyup(function() {
			var harga  = $("#harga").val();
			var lama = $("#lama").val();
			var total = parseInt(harga) * parseInt(lama);
			$("#total").val(total);
		});
	});

	(function () {
		$('.form').on('submit', function () {
			$('.button-prevent').attr('disabled', 'true');
			$('.spinner').show();
			$('.hide-text').hide();
		})
	})();

	$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="form-group add"><div class="row">';
    fieldHTML=fieldHTML + '<div class="col-sm-10"><input class="form-control" placeholder="Merek Mobil" type="text" name="merek[]" /></div>';
    fieldHTML=fieldHTML + '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="bi bi-trash3"></i></a></div>';
    fieldHTML=fieldHTML + '</div></div>'; 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
    	if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
    	e.preventDefault();
        $(this).parent('').parent('').remove(); //Remove field html
        x--; //Decrement field counter
    });
});


	$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_button_jenis'); //Add button selector
    var wrapper = $('.field_wrapper_jenis'); //Input field wrapper
    var fieldHTML = '<div class="form-group add"><div class="row">';
    fieldHTML=fieldHTML + '<div class="col-sm-10"><input class="form-control" placeholder="Contoh: Mini bus/Bus" type="text" name="jenis_mobil[]" /></div>';
    fieldHTML=fieldHTML + '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="bi bi-trash3"></i></a></div>';
    fieldHTML=fieldHTML + '</div></div>'; 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
    	if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
    	e.preventDefault();
        $(this).parent('').parent('').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

	$(document).ready(function() {
		$("#show_hide_password a").on('click', function(event) {
			event.preventDefault();
			if($('#show_hide_password input').attr("type") == "text"){
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass( "bi bi-eye-slash" );
				$('#show_hide_password i').removeClass( "bi bi-eye" );
			}else if($('#show_hide_password input').attr("type") == "password"){
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass( "bi bi-eye-slash" );
				$('#show_hide_password i').addClass( "bi bi-eye" );
			}
		});
	});

	

	
	
</script>
</body>
@include('sweetalert::alert')

</html>