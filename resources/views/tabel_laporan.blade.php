@extends('master')

@section('content')
<center>
		<h5>LAPORAN REKAPITULASI KEHADIRAN</h5>
        <h5>ASISTEN PERPUSTAKAAN UNIVERSITAS GUNADARMA</h5>
        <h5>KAMPUS H</h5>		
        <h5>{{ session('tgl_awal') }} SAMPAI DENGAN {{ session('tgl_akhir') }}</h5>
		<h5>(-JAM)</h5>	
	</center>
<br>
<div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card shadow">
					<div class="card-body">
						<center>						
							<table class="table table table-bordered table-striped table-hover">
								<thead>
								<tr>
									<th style="width: 50px">No.</th>
									<th>Nama</th>
									<th>No Rekening</th>
									<th style="width: 100px">Total Jam</th>			
								</tr>
								</thead>
								<tbody>
								<?php $no = 0;?>
								@foreach($laporan as $l)
								<?php $no++ ;?>
								<tr>
									<td>{{ $no }}</td>									
									<td>{{ $l->name }}</td>			
									<td>{{ $l->no_rek }}</td>
									<td>{{ $l->total_jam }}</td>    			
								</tr>
								@endforeach
								</tbody>
							</table>			
						</center>
							<br>
							<p class="kanan indent">
							Penanggung Jawab
							<br>
							<br>
							<br>
							<p class="kanan indent1">(...........)</p>
							</p>
							<br>
							<br>
							<a class="btn btn-outline-warning" href="/laporan"> Kembali</a>
							<a href="/laporan/tabel/cetak_pdf" class="btn btn-outline-primary" target="_blank">Cetak PDF</a>
						
				</div>
			</div>
		</div>
</div>
@endsection

