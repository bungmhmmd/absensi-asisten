<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DaftarAsistenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function daftar()
    {   
        // mengambil data dari table asisten
		$users = \DB::table('users')
					->orderBy('name', 'asc')
					->paginate(10);

    	// mengirim data asisten ke view daftar-asisten
    	return view('daftar-asisten',['users' => $users]);

    }


	// method untuk edit data asisten
	public function edit($user_id)
	{
	// mengambil data asisten berdasarkan id yang dipilih
	$users = \DB::table('users')->where('user_id',$user_id)->get();
	// passing data asisten yang didapat ke view edit.blade.php
	return view('edit',['users' => $users]);
	}

	// update data asisten
	public function update(Request $request)
	{
	// update data asisten
	\DB::table('users')->where('user_id',$request->user_id)->update([
		'user_id' => $request->user_id,
		'name' => $request->name,
		'email' => $request->email,
		'alamat' => $request->alamat,
		'notelp' => $request->notelp,
        'kelas' => $request->kelas,
		'jurusan' => $request->jurusan,
		'no_rek' => $request->no_rek,
		'type' => $request->type
	]);
	// alihkan halaman ke halaman asisten
	return redirect('/daftar-asisten');
	}

	// method untuk hapus data asisten
	public function hapus($user_id)
	{
	// menghapus data asisten berdasarkan id yang dipilih
	\DB::table('users')->where('user_id',$user_id)->delete();
		
	// alihkan halaman ke halaman asisten
	return redirect('/daftar-asisten');
	}

	public function cari(Request $request)
	{
		//menangkap data pencarian
		$cari = $request->cari;

		//mengambil data dari table asisten sesuai pencarian data
		$users = \DB::table('users')
		->where('user_id','like',"%".$cari."%")
		->paginate();

		//mengirim data asisten ke view daftar-asisten
		return view('cari-data-asisten',['users'=>$users]);
	}
}