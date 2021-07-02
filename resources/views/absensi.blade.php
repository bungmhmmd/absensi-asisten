@extends('layout')

@section('content')
<h2>Absensi</h2>
<br>
<?php
if(session('absen_m') === true){
	echo '<div class="alert alert-success shadow">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Absen kedatangan sukses</strong>
	</div>';
}
if(session('absen_k') === true){
	echo '<div class="alert alert-success shadow">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Absen pulang sukses</strong>
	</div>';
}
?>
<div class="row">
	<div class="col">
		<div class="card shadow">
			<div class="card-header">Absen kedatangan</div>
				<div class="card-body">                    
					<form action="/absensi/masuk/{{ Auth::user()->user_id }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">                    
							<input class="form-control" type="text" name="user_id" required="required" value="{{ Auth::user()->user_id }}"> 
						</div>
						<div class="form-group">
							<input class="btn btn-primary ml-3" type="submit" value="Absen">
						</div> 
					</form>
				</div>        
			</div>
		</div>
	
	<div class="col">
		<div class="card shadow">
			<div class="card-header">Absen pulang</div>
				<div class="card-body">                
					<form action="/absensi/keluar/{{ Auth::user()->user_id }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">                    
							<input class="form-control" type="text" name="user_id" required="required" value="{{ Auth::user()->user_id }}"> 
						</div>        
						<div class="form-group">
							<input class="btn btn-primary ml-3" type="submit" value="Absen">
						</div>                                 
					</form>
				</div>        
			</div>
		</div>
	
</div>
<br>
<h2>Daftar Absensi</h2>
<div class="card shadow">
		<div class="card-body">	
			<table class="table table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Waktu Masuk</th>
						<th>Waktu Keluar</th>			
					</tr>
				</thead>
				<tbody>
				@foreach($absensi as $b)
					<tr>
						<td>{{ $b->user_id }}</td>
						<td>{{ $b->name }}</td>			
						<td>{{ $b->waktu_masuk }}</td>
						<td>{{ $b->waktu_keluar }}</td>        			
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
</div>
@endsection

