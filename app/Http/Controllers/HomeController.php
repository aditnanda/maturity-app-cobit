<?php

namespace App\Http\Controllers;
use App\Dokumen;
use PDF;
use Symfony\Component\Templating\EngineInterface;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;

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
            //total dari skor maturity dibagi dengan jumlah proses yang diinput
            //semisal proses dari kelompok APO jika ditotal ada 5
            //maka total dari skor maturity dibagi 5
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
        
        $data['dokumen'] = Dokumen::all();

        $pdf = PDF::loadview('pages.report',$data);

        // dd($pdf);
        // return $pdf->download('laporan-hasil-pdf');

        return view('pages.report',$data);
        
        // return $pdf->stream('my.pdf',array('Attachment'=>0));
    }
}
