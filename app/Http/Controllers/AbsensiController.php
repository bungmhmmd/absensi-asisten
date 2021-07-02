<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index() {
        $tanggal=Carbon::now(new \DateTimeZone('Asia/Jakarta'))->format('Y-m-d');
        //session()->forget(['absen_m', 'absen_k']);
        //session(["absen_m"=> false]);  
        //session(["absen_k"=> false]);  
        // mengambil data dari table absensi
        $absensi = \DB::table('absensi')
                        ->join('users','absensi.user_id','=','users.user_id')
                        ->select('absensi.*','users.name')
                        ->where('absensi.tanggal',$tanggal)->paginate(10);
                
        return view('/absensi',['absensi' => $absensi]);
    }

    public function masuk($user_id) {        
        $waktu_masuk=Carbon::now(new \DateTimeZone('Asia/Jakarta'));
        $tanggal=Carbon::now(new \DateTimeZone('Asia/Jakarta'))->format('Y-m-d');
        $cek=\DB::table('absensi')->where([
            ['user_id',Auth::user()->user_id],
            ['tanggal',$tanggal]
        ])->first(); 
        if ($cek === null) {
            
        \DB::table('absensi')->insert([
            'user_id' => $user_id,
            'tanggal' => $tanggal,
            'waktu_masuk' => $waktu_masuk            
        ]);
        session()->flash('absen_m', true);      
         }
        return redirect('/absensi');
    }

    public function keluar($user_id) {
        $tanggal=Carbon::now(new \DateTimeZone('Asia/Jakarta'))->format('Y-m-d');
        $absensi_id=\DB::table('absensi')->where([
            ['user_id',$user_id],
            ['tanggal',$tanggal]
        ])->value('absensi_id'); 
        $waktu_keluar=Carbon::now(new \DateTimeZone('Asia/Jakarta')); 
        $waktu_masuk=\DB::table('absensi')->where('absensi_id',$absensi_id)->value('waktu_masuk'); 

        $timeDiff=$waktu_keluar->diffInHours($waktu_masuk);
        $cek=\DB::table('absensi')->where([
            ['user_id',Auth::user()->user_id],
            ['tanggal',$tanggal]            
        ])->value('waktu_keluar'); 
        if ($cek === null) {
        \DB::table('absensi')->where('absensi_id',$absensi_id)->update([
            'waktu_keluar' => $waktu_keluar,
            'total_jam' => $timeDiff            
        ]);
        session()->flash('absen_k', true);
        }
        return redirect('/absensi');
    }
}
