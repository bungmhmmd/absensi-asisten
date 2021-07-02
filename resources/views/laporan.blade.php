@extends('layout')

@section('content')
<h2>Laporan</h2>
<br>
<div class="card shadow">
			<div class="card-header">Masukan tanggal laporan awal dan akhir</div>
            <div class="card-body">                    
                <form action="/laporan/tabel" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="tgl_awal">Tanggal Awal</label>
						<input class="form-control" type="date" name="tgl_awal" required="required"> 
					</div>	
					<div class="form-group">
						<label for="tgl_akhir">Tanggal Akhir</label>
						<input class="form-control" type="date" name="tgl_akhir" required="required"> 
					</div>				
					<div class="form-group">
					<input class="btn btn-primary ml-3" type="submit" value="Simpan Tanggal">
					</div> 
                </form>                                
            </div>        
</div>
@endsection

