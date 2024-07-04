<?php

namespace App\Http\Controllers;

use App\Models\APBN;
use App\Models\RPJM;
use App\Models\DURKP;
use App\Models\LKPPN;
use App\Models\LPJ;
use App\Models\LPPN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PerencanaanController extends Controller
{
    public function rpjm()
    {
        $rpjm = RPJM::all();
        return view('frontend.perencanaan.rpjm', compact('rpjm'));
    }

    public function download_rpjm($id)
    {
        $id_rpjm = Crypt::decrypt($id);
        $download_rpjm = RPJM::where('id_rpjm', $id_rpjm)->first();
        return view('frontend.perencanaan.download.download_rpjm', compact('download_rpjm'));
    }

    public function durkp()
    {
        $durkp = DURKP::all();
        return view('frontend.perencanaan.durkp', compact('durkp'));
    }

    public function download_durkp($id)
    {
        $id_durkp = Crypt::decrypt($id);
        $download_durkp = DURKP::where('id_durkp', $id_durkp)->first();
        return view('frontend.perencanaan.download.download_durkp', compact('download_durkp'));
    }

    public function apbn()
    {
        $apbn = APBN::all();
        return view('frontend.perencanaan.apbn', compact('apbn'));
    }

    public function download_apbn($id)
    {
        $id_apbn = Crypt::decrypt($id);
        $download_apbn = APBN::where('id_apbn', $id_apbn)->first();
        return view('frontend.perencanaan.download.download_apbn', compact('download_apbn'));
    }

    public function lppn()
    {
        $lppn = LPPN::all();
        return view('frontend.perencanaan.lppn', compact('lppn'));
    }

    public function download_lppn($id)
    {
        $id_lppn = Crypt::decrypt($id);
        $download_lppn = LPPN::where('id_lppn', $id_lppn)->first();
        return view('frontend.perencanaan.download.download_lppn', compact('download_lppn'));
    }

    public function lkppn()
    {
        $lkppn = LKPPN::all();
        return view('frontend.perencanaan.lkppn', compact('lkppn'));
    }

    public function download_lkppn($id)
    {
        $id_lkppn = Crypt::decrypt($id);
        $download_lkppn = LKPPN::where('id_lkppn', $id_lkppn)->first();
        return view('frontend.perencanaan.download.download_lkppn', compact('download_lkppn'));
    }

    public function lpj()
    {
        $lpj = LPJ::all();
        return view('frontend.perencanaan.lpj', compact('lpj'));
    }

    public function download_lpj($id)
    {
        $id_lpj = Crypt::decrypt($id);
        $download_lpj = LPJ::where('id_lpj', $id_lpj)->first();
        return view('frontend.perencanaan.download.download_lpj', compact('download_lpj'));
    }
}
