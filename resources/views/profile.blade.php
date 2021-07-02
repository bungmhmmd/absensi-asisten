@extends('master')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                    <div class="card-body"> 
                        <h2 class="text-center">Profile User</h2>               
                        @foreach($users as $u)
                        <form action="/profile/update" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="user_id">ID</label>
                                <input class="form-control" type="text" required="required" name="user_id" value="{{ $u->user_id }}"> 
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" required="required" name="name" value="{{ $u->name }}"> 
                            </div>         

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" required="required" name="email" value="{{ $u->email }}"> 
                            </div>   
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label> 
                                <textarea class="form-control" name="alamat" required="required">{{ $u->alamat }}</textarea> 
                            </div>
                            
                            <div class="form-group">
                                <label for="notelp">Notelp</label>
                                <input class="form-control" type="text" required="required" name="notelp" value="{{ $u->notelp }}"> 
                            </div>
                            
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input class="form-control" type="text" required="required" name="kelas" value="{{ $u->kelas }}"> 
                            </div>
                            
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input class="form-control" type="text" required="required" name="jurusan" value="{{ $u->jurusan }}"> 
                            </div>

                            <div class="form-group">
                                <label for="no_rek">No Rekening</label>
                                <input class="form-control" type="text" required="required" name="no_rek" value="{{ $u->no_rek }}"> 
                            </div>  
                                        
                            <div class="form-group">
                            <input class="btn btn-primary ml-3" type="submit" value="Simpan Data">
                            <a class="btn btn-outline-warning" href="/"> Kembali</a>
                            </div>
                        </form>
                        @endforeach
                        </div>        
            </div>
        </div>
</div>
@endsection

