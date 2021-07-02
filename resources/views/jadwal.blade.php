@extends('layout')

@section('content')
<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin: 5px;
		}
</style>
<h2>Jadwal Jaga Asisten</h2>
<br>
<div class="card shadow">
        <div class="card-body"> 
                <table class="table table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jum'at</th>
                                <th>Sabtu</th>
                                @if ( Auth::user()->type  == 'admin')
                                <th>Opsi</th>
                                @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jadwal as $j)
                        <tr>
                                <td>{{ $j->user_id }}</td>			
                                <td>{{ $j->name }}</td>
                                <td>{{ $j->senin }}</td>
                                <td>{{ $j->selasa }}</td>
                                <td>{{ $j->rabu }}</td>
                                <td>{{ $j->kamis }}</td>
                                <td>{{ $j->jumat }}</td>
                                <td>{{ $j->sabtu }}</td>
                                @if ( Auth::user()->type  == 'admin')
                                <td>
                                        <a class="btn btn-warning btn-sm" href="/jadwal/edit/{{ $j->user_id }}">Edit</a>
                                        |
                                        <a class="btn btn-danger btn-sm" href="/jadwal/hapus/{{ $j->user_id }}">Hapus</a>
                                </td>
                                @endif
                        </tr>
                        @endforeach
                        </tbody>
                </table>

                <br/>
                Halaman : {{ $jadwal -> currentPage() }} <br/>
                Jumlah : {{ $jadwal -> total() }} <br/>
                Data Per Halaman : {{ $jadwal -> perPage() }} <br/>
                {{ $jadwal -> links() }}
                <br>
                <br/>
                @if ( Auth::user()->type  == 'admin')
                <a class="btn btn-outline-success" href="/jadwal/tambah"> + Tambah jadwal asisten Baru</a>
                @endif
                
        </div>        
</div>  
@endsection

