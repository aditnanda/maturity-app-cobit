<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dokumen;

class DokumenController extends Controller
{
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

        $data['saatini'] = array();
        $data['domain'] = array();
        $data['harapan'] = array();
        foreach ($data['maturity'] as $key) {
            array_push($data['saatini'],$key['skor']);
            array_push($data['domain'],$key['domain']);
            array_push($data['harapan'],$key['target']);
        }

        return response()->json($data, 200);
    }
    
}
