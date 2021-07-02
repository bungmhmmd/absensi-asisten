@extends('master')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                        <div class="card-body">	
                        <h2 class="text-center">Tambah Jadwal Jaga</h2>
                        <br>
                        <br>								
                        <form action="/jadwal/store" method="post">
                            {{ csrf_field() }}            
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input class="form-control" type="text" name="user_id" required="required"> 
                            </div>

                            <div class="form-group">
                                <label for="senin">Senin</label>
                                <select class="form-control" name="senin">
                                    <option>-</option>
                                    <option>Full</option>
                                    <option>Pagi</option>
                                    <option>Siang</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="selasa">Selasa</label>
                                <select class="form-control" name="selasa">
                                    <option>-</option>
                                    <option>Full</option>
                                    <option>Pagi</option>
                                    <option>Siang</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="rabu">Rabu</label>
                                <select class="form-control" name="rabu">
                                    <option>-</option>
                                    <option>Full</option>
                                    <option>Pagi</option>
                                    <option>Siang</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kamis">Kamis</label>
                                <select class="form-control" name="kamis">
                                    <option>-</option>
                                    <option>Full</option>
                                    <option>Pagi</option>
                                    <option>Siang</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jumat">Jum'at</label>
                                <select class="form-control" name="jumat">
                                    <option>-</option>
                                    <option>Full</option>
                                    <option>Pagi</option>
                                    <option>Siang</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sabtu">Sabtu</label>
                                <select class="form-control" name="sabtu">
                                    <option>-</option>
                                    <option>Full</option>                                    
                                </select>
                            </div>      

                            <div class="form-group">
                            <input class="btn btn-primary ml-3" type="submit" value="Simpan Data">
                            <a class="btn btn-outline-warning" href="/jadwal"> Kembali</a>
                            </div>                
                        </form>
                        </div>
                    
            </div>
        </div>
</div>
@endsection

