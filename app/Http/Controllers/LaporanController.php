<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class LaporanController extends Controller
{
    public function index() {      
        return view('laporan');
    }

    public function tabel(Request $request) {    
        $kondisi=true;   
        //$tgl_awal= $request->input('tgl_awal');  
        $tgl_awal = new \DateTime($request->input('tgl_awal')); 
        $tgl_akhir = new \DateTime($request->input('tgl_akhir'));
        //$tgl = Carbon::parse($tgl_awal)->format('Y-m-d');   
        //$tgl_akhir=Carbon::now()->format('Y-m-d');
        //$tgl_akhir= $request->input('tgl_akhir');              
        $laporan = \DB::table('absensi')
                        ->join('users','absensi.user_id','=','users.user_id')
                        ->select('users.no_rek','users.name',\DB::raw('sum(absensi.total_jam) total_jam'),'absensi.tanggal')
                        ->where('absensi.tanggal', '>=', $tgl_awal)
                        ->where('absensi.tanggal', '<=', $tgl_akhir)
                        ->groupBy('absensi.user_id')
                        ->orderBy('name', 'asc')                        
                        ->get();
        //$this->cetak_pdf($request);
        session(["tgl_awal"=>$request->input('tgl_awal')]);
        session(["tgl_akhir"=>$request->input('tgl_akhir')]);
        return view('/tabel_laporan',['laporan' => $laporan],['tanggal' => $request]);
    }

    public function cetak_pdf()
    {
        $tgl_awal = session('tgl_awal'); 
        $tgl_akhir = session('tgl_akhir');
    	$laporan = \DB::table('absensi')
                            ->join('users','absensi.user_id','=','users.user_id')
                            ->select('users.no_rek','users.name',\DB::raw('sum(absensi.total_jam) total_jam'),'absensi.tanggal')
                            ->where('absensi.tanggal', '>=', $tgl_awal)
                            ->where('absensi.tanggal', '<=', $tgl_akhir)
                            ->groupBy('absensi.user_id')   
                            ->orderBy('name', 'asc')                     
                            ->get();
        $tanggal=[$tgl_awal,$tgl_akhir];
    	$pdf = PDF::loadview('laporan_pdf',['laporan'=>$laporan]);
    	return $pdf->download('laporan-rekapan-jam-asisten-pdf');
    }
}
