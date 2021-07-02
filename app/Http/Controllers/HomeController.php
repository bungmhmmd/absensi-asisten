<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$waktu=Carbon::now(new \DateTimeZone('Asia/Jakarta'));
		$waktu->isoFormat('MMMM Do YYYY, h:mm:ss a');
        return view('home',$waktu);
	}
	
	public function profile($user_id)
	{	
	$users = \DB::table('users')->where('user_id',$user_id)->get();	
	return view('profile',['users' => $users]);

	}
	public function profileupdate(Request $request)
	{	
	\DB::table('users')->where('user_id',$request->user_id)->update([
		'user_id' => $request->user_id,
		'name' => $request->name,
		'email' => $request->email,
		'alamat' => $request->alamat,
		'notelp' => $request->notelp,
        'kelas' => $request->kelas,
		'jurusan' => $request->jurusan,
		'no_rek' => $request->no_rek
	]);	
	return redirect('/');
	}
    
    
    public function home()
	{	
		$tgl_awal = Carbon::now()->startOfMonth()->subMonth()->toDateString();
		$tgl_akhir = Carbon::now()->subMonth()->endOfMonth()->toDateString();		
		$user_id = Auth::user()->user_id;
		//$tgl_awal= '2019/6/25';      
		//$tgl_akhir= '2019-6-31'; 
		$waktu=Carbon::now(new \DateTimeZone('Asia/Jakarta'))->format('Y/m/d');
		$total_jam = \DB::table('absensi')
                        ->join('users','absensi.user_id','=','users.user_id')
                        ->select(\DB::raw('sum(absensi.total_jam) total_jam'))
                        ->where('absensi.tanggal', '>=', $tgl_awal)
						->where('absensi.tanggal', '<=', $tgl_akhir)
						->where('absensi.user_id', $user_id)
                        ->groupBy('absensi.user_id')                        
						->value('total_jam');	
		$jadwal = \DB::table('jadwal')
						->join('users','jadwal.user_id','=','users.user_id')
						->select('jadwal.*','users.name','users.user_id')
						->where('jadwal.user_id', $user_id)
						->get();
        return view('home',compact('waktu','total_jam','jadwal'));	
	}	
}
