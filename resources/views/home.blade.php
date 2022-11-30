@extends('layout.main')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Home</h1>
	<ol class="breadcrumb">
		
	</ol>
</div>
<div class="row mb-3">

  @if(auth()->user()->role == 1)
  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">User Admin</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$admin}}</div>
            <div class="mt-2 mb-0 text-muted text-xs">
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-secondary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">User Customer</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
            <div class="mt-2 mb-0 text-muted text-xs">
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Mobil</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mobil}}</div>
            <div class="mt-2 mb-0 text-muted text-xs">
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-car fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Mobil Kembali</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
              {{$mobil_kembali}}
            </div>
            <div class="mt-2 mb-0 text-muted text-xs">

            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-car fa-2x text-info"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card">
      
      <div class="card-body">
        <div class="table-responsive">
          <figure class="highcharts-figure">
            <div id="container"></div>

            <button class="btn btn-primary" id="plain"><i class="bi bi-bar-chart-line"></i></button>
            <button class="btn btn-warning" id="inverted"><i class="bi bi-body-text"></i></button>
            <button class="btn btn-success" id="polar"><i class="bi bi-pie-chart"></i></button>
          </figure>
        </div>
      </div>
    </div>
  </div>

  @endif

  @if(auth()->user()->role == 2)
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Mobil</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mobil}}</div>
            <div class="mt-2 mb-0 text-muted text-xs">
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-car fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase mb-1">Pendding</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
             <p>{{$mobil_pending}}</p>
           </div>
           <div class="mt-2 mb-0 text-muted text-xs">
           </div>
         </div>
         <div class="col-auto">
          <i class="fas fa-car fa-2x text-warning"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">Mobil Keluar</div>
          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

            {{$mobil_keluar}}

          </div>
          <div class="mt-2 mb-0 text-muted text-xs">
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-car fa-2x text-danger"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">Mobil Kembali</div>
          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
            {{$mobil_kembali}}
          </div>
          <div class="mt-2 mb-0 text-muted text-xs">

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-car fa-2x text-info"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">User Customer</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
          <div class="mt-2 mb-0 text-muted text-xs">
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user fa-2x text-primary"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-9 mb-9">
  <div class="card">
    <div class="card-body">
      <figure class="highcharts-figure">
        <div id="container"></div>

        <button class="btn btn-primary" id="plain"><i class="bi bi-bar-chart-line"></i></button>
        <button class="btn btn-warning" id="inverted"><i class="bi bi-body-text"></i></button>
        <button class="btn btn-success" id="polar"><i class="bi bi-pie-chart"></i></button>
      </figure>
    </div>
  </div>
</div>
@endif

@if(auth()->user()->role == 3)
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Belum Dibayar</div>

          <div class="h5 mb-0 font-weight-bold text-gray-800">
            {{$pesanan_belum_dibayar}}
          </div>

          <div class="mt-2 mb-0 text-muted text-xs">
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-car fa-2x text-warning"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Sudah Dibayar</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            {{$pesanan_sudah_dibayar}}
          </div>
          <div class="mt-2 mb-0 text-muted text-xs">
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-car fa-2x text-success"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Pembayaran</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pembayaran}}</div>
          <div class="mt-2 mb-0 text-muted text-xs">
          </div>
        </div>
        <div class="col-auto">
          <i class="bi bi-currency-dollar fa-2x text-warning"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-uppercase mb-1">Riwayat Transaksi</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$riwayat}}</div>
          <div class="mt-2 mb-0 text-muted text-xs">
          </div>
        </div>
        <div class="col-auto">
          <i class="bi bi-repeat fa-2x text-secondary"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endif

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
  const chart = Highcharts.chart('container', {
    title: {
      text: 'Grafik Bulanan'
    },
    subtitle: {
      text: ''
    },
    xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    series: [{
      type: 'column',
      name: 'jumlah',
      colorByPoint: true,
      data: [{{$bulan1}},
        {{$bulan2}},
        {{$bulan3}},
        {{$bulan4}},
        {{$bulan5}},
        {{$bulan6}},
        {{$bulan7}},
        {{$bulan8}},
        {{$bulan9}},
        {{$bulan10}},
        {{$bulan11}},
        {{$bulan12}}
        ],
      showInLegend: false
    }]
  });

  document.getElementById('plain').addEventListener('click', () => {
    chart.update({
      chart: {
        inverted: false,
        polar: false
      },
      
    });
  });

  document.getElementById('inverted').addEventListener('click', () => {
    chart.update({
      chart: {
        inverted: true,
        polar: false
      },
      subtitle: {
        text: ''
      }
    });
  });

  document.getElementById('polar').addEventListener('click', () => {
    chart.update({
      chart: {
        inverted: false,
        polar: true
      },
      subtitle: {
        text: ''
      }
    });
  });
</script>
@endsection
