<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class JadwalController extends Controller
{
    public function jadwal()
    {
    	// mengambil data dari table asisten
		$jadwal = \DB::table('jadwal')
						->join('users','jadwal.user_id','=','users.user_id')
						->select('jadwal.*','users.name','users.user_id')
						->paginate(10);

    	// mengirim data asisten ke view jadwal
    	return view('jadwal',['jadwal' => $jadwal]);

    }        

	public function tambah()
	{
		//memanggil view tambah
		return view('tambah-jadwal');
	}

	// method untuk insert data ke table asisten
	public function store(Request $request)
	{
	// insert data ke table asisten
	\DB::table('jadwal')->insert([
        'user_id' => $request->user_id,
		'senin' => $request->senin,
		'selasa' => $request->selasa,
		'rabu' => $request->rabu,
        'kamis' => $request->kamis,
        'jumat' => $request->jumat,
        'sabtu' => $request->sabtu
	]);
	// alihkan halaman ke halaman asisten
	return redirect('/jadwal');

	}

	// method untuk edit data asisten
	public function edit($user_id)
	{
	// mengambil data asisten berdasarkan id yang dipilih
	$jadwal = \DB::table('jadwal')->where('user_id',$user_id)->get();
	// passing data asisten yang didapat ke view edit.blade.php
	return view('edit-jadwal',['jadwal' => $jadwal]);
	}

	// update data asisten
	public function update(Request $request)
	{
	// update data asisten
	\DB::table('jadwal')->where('user_id',$request->user_id)->update([
		'user_id' => $request->user_id,
		'senin' => $request->senin,
		'selasa' => $request->selasa,
		'rabu' => $request->rabu,
        'kamis' => $request->kamis,
        'jumat' => $request->jumat,
        'sabtu' => $request->sabtu
	]);
	// alihkan halaman ke halaman asisten
	return redirect('/jadwal');
	}

	// method untuk hapus data asisten
	public function hapus($user_id)
	{
	// menghapus data asisten berdasarkan id yang dipilih
	\DB::table('jadwal')->where('user_id',$user_id)->delete();
		
	// alihkan halaman ke halaman asisten
	return redirect('/jadwal');
	}
}
