<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsistenController extends Controller
{
    public function daftarasisten()
    {
    	// mengambil data dari table asisten
    	$asisten = \DB::table('asisten')->paginate(10);

    	// mengirim data asisten ke view daftar-asisten
    	return view('daftar-asisten',['asisten' => $asisten]);

    }
    
    public function home()
	{		
		return view('home');
	}
	
	public function tambah()
	{
		//memanggil view tambah
		return view('tambah');
	}

	// method untuk insert data ke table asisten
	public function store(Request $request)
	{
	// insert data ke table asisten
	\DB::table('asisten')->insert([
        'asisten_id' => $request->id,
		'asisten_nama' => $request->nama,
		'asisten_alamat' => $request->alamat,
		'asisten_notelp' => $request->notelp,
        'asisten_kelas' => $request->kelas,
        'asisten_jurusan' => $request->jurusan
	]);
	// alihkan halaman ke halaman asisten
	return redirect('/daftar-asisten');

	}

	// method untuk edit data asisten
	public function edit($id)
	{
	// mengambil data asisten berdasarkan id yang dipilih
	$asisten = \DB::table('asisten')->where('asisten_id',$id)->get();
	// passing data asisten yang didapat ke view edit.blade.php
	return view('edit',['asisten' => $asisten]);

	}

	// update data asisten
	public function update(Request $request)
	{
	// update data asisten
	\DB::table('asisten')->where('asisten_id',$request->id)->update([
		'asisten_id' => $request->id,
		'asisten_nama' => $request->nama,
		'asisten_alamat' => $request->alamat,
		'asisten_notelp' => $request->notelp,
        'asisten_kelas' => $request->kelas,
        'asisten_jurusan' => $request->jurusan
	]);
	// alihkan halaman ke halaman asisten
	return redirect('/daftar-asisten');
	}

	// method untuk hapus data asisten
	public function hapus($id)
	{
	// menghapus data asisten berdasarkan id yang dipilih
	\DB::table('asisten')->where('asisten_id',$id)->delete();
		
	// alihkan halaman ke halaman asisten
	return redirect('/daftar-asisten');
	}

	public function cari(Request $request)
	{
		//menangkap data pencarian
		$cari = $request->cari;

		//mengambil data dari table asisten sesuai pencarian data
		$asisten = \DB::table('asisten')
		->where('asisten_id','like',"%".$cari."%")
		->paginate();

		//mengirim data asisten ke view daftar-asisten
		return view('daftar-asisten',['asisten'=>$asisten]);
	}
}
