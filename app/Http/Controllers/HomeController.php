<?php

namespace App\Http\Controllers;
use App\Dokumen;
use PDF;
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dokumen = Dokumen::all()->groupBy('nama_proses');

        $data['maturity'] = array();

        //untuk data tabel
        $n_skor = 0;
        $n_target = 0;
        foreach ($dokumen as $key => $value) {
            $total = 0;
            $jumlah = 0;

            $target =0;
            $jumlah_target = 0;

            $gap = 0;
            foreach ($value as $key2 => $value2) {
                if (null != $value2->skor_maturity) {
                    $total += $value2->skor_maturity;
                    $jumlah++;
                }
                if (null != $value2->target_skor) {
                    $target += $value2->target_skor;
                    $jumlah_target++;
                }
                
            }
            if ($total != 0) {
                $total = $total/$jumlah;
            }
            if ($target != 0) {
                $target = $target/$jumlah_target;
                $gap = $target - $total;
            }
            $data['maturity'][] = array(
                'domain' => $key,
                'skor'  => $total,
                'target' => $target,
                'gap'      => $gap
            );

            $n_skor += $total;
            $n_target += $target;
        }

        $data['maturity_level'] =array(
            'skor'  => $n_skor/count($dokumen),
            'target' => $n_target/count($dokumen),
        );
        // dd($data);

        return view('dashboard', $data);
    }

    public function report()
    {
        $dokumen = Dokumen::all()->groupBy('nama_proses');

        $data['maturity'] = array();

        //untuk data tabel
        $n_skor = 0;
        $n_target = 0;
        foreach ($dokumen as $key => $value) {
            $total = 0;
            $jumlah = 0;

            $target =0;
            $jumlah_target = 0;

            $gap = 0;
            foreach ($value as $key2 => $value2) {
                if (null != $value2->skor_maturity) {
                    $total += $value2->skor_maturity;
                    $jumlah++;
                }
                if (null != $value2->target_skor) {
                    $target += $value2->target_skor;
                    $jumlah_target++;
                }
                
            }
            if ($total != 0) {
                $total = $total/$jumlah;
            }
            if ($target != 0) {
                $target = $target/$jumlah_target;
                $gap = $target - $total;
            }
            $data['maturity'][] = array(
                'domain' => $key,
                'skor'  => $total,
                'target' => $target,
                'gap'      => $gap
            );

            $n_skor += $total;
            $n_target += $target;
        }

        $data['maturity_level'] =array(
            'skor'  => $n_skor/count($dokumen),
            'target' => $n_target/count($dokumen),
        );
        // dd($data);
        
        $dok['dokumen'] = Dokumen::all();

        // return view('pages.report', $data, $dok);
        $pdf = PDF::loadview('pages.report',$data, $dok);
        // return $pdf->download('laporan-hasil-pdf');
        return $pdf->stream();
    }
}
