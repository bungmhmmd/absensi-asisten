<!DOCTYPE html>
<html>
<head>
	<title>Laporan rekapan jam asisten</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
        .kanan{
				text-align:right;
			}
        p.indent{ padding-right: 4em }
        p.indent1{ padding-right: 6.5em }

		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN REKAPITULASI KEHADIRAN</h5>
        <h5>ASISTEN PERPUSTAKAAN UNIVERSITAS GUNADARMA</h5>
        <h5>KAMPUS H</h5>		
        <h5>{{ session('tgl_awal') }} SAMPAI DENGAN {{ session('tgl_akhir') }}</h5>
		<h5>(-JAM)</h5>		
	</center>
    <br>
    <br>
	<div class="content">
	<div class="row justify-content-center">
        <div class="col-md-6">
			<center>						
				<table class="table table-sm table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th style="width: 50px">No.</th>
							<th>Nama</th>
							<th style="width: 200px">No Rekening</th>
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
		</div>
	</div>
	</div>
    <br>
    <br>
	<p class="kanan indent">
	Penanggung Jawab
	<br>
	<br>
	 <p class="kanan indent1">(............)</p>
	</p>

</body>
</html>