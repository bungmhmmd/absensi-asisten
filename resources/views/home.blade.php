@extends('layout')

@section('content')
        
<h2>Hallo, {{ Auth::user()->name }}</h2>   
<br>
<div class="alert alert-warning shadow">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Tolong untuk melengkapi data anda pada bagian profile</strong>
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jabatan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->type }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-id-badge fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Jam Bulan Lalu</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_jam }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-plus-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jam</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><p id="watch"></p></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clock fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tanggal</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $waktu }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
                      
<script>
  window.setTimeout("waktu()", 1000);    
  function waktu() {
  var waktu = new Date();
  setTimeout("waktu()", 1000);
  var hr = waktu.getHours();
  var m = waktu.getMinutes();
  var s = waktu.getSeconds();
  var Time = hr + ":" + m + ":" + s;
  document.getElementById("watch").innerHTML = Time;        
  }
</script>
<br>
<div class="card shadow">
  <div class="card-header">Jadwal Jaga Anda</div>
    <div class="card-body">
      <div class="content">
        <table class="table table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th></th>                                  
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jum'at</th>
                <th>Sabtu</th>
            </tr>
          </thead>
          <tbody>
             @foreach($jadwal as $j)
             <tr>
                <th>Sesi</th>
                <td>{{ $j->senin }}</td>
                <td>{{ $j->selasa }}</td>
                <td>{{ $j->rabu }}</td>
                <td>{{ $j->kamis }}</td>
                <td>{{ $j->jumat }}</td>
                <td>{{ $j->sabtu }}</td>                                
             </tr>
                        @endforeach
          </tbody>
      </table>
    </div>
  </div>                           
</div>

@endsection

