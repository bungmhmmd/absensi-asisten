@extends('layout')

@section('content')
	

	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin: 5px;
		}
	</style>

<h2 class="text">Tabel Data Asisten</h2>
<br>
<div class="card shadow">
		<div class="card-header">Cari Data asisten berdasarkan ID</div>
        <div class="card-body">									
			<div class="form-group">
			</div>
			<form action="/daftar-asisten/cari" method="GET" class="form-inline">
				<input class="form-control" type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
				<input class="btn btn-primary ml-3" type="submit" value="CARI">
			</form>									
		</div>                           
</div>

<br>
<div class="card shadow">
        <div class="card-body">	
	<table class="table table table-bordered table-striped table-hover">
		<thead>
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Alamat</th>			
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Jabatan</th>
			<th>Opsi</th>
		</tr>
		</thead>
		<tbody>
		@foreach($users as $u)
		<tr>
			<td>{{ $u->user_id }}</td>			
			<td>{{ $u->name }}</td>
			<td>{{ $u->email }}</td>
			<td>{{ $u->alamat }}</td>
			<td>{{ $u->kelas }}</td>
			<td>{{ $u->jurusan }}</td>
			<td>{{ $u->type }}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="/daftar-asisten/edit/{{ $u->user_id }}">Edit</a>
				|
				<a class="btn btn-danger btn-sm" href="/daftar-asisten/hapus/{{ $u->user_id }}">Hapus</a>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>

	<br/>
	Halaman : {{ $users -> currentPage() }} <br/>
	Jumlah : {{ $users -> total() }} <br/>
	Data Per Halaman : {{ $users -> perPage() }} <br/>
		<br/>
	{{ $users -> links() }}
	
 </div>                           
</div>
@endsection