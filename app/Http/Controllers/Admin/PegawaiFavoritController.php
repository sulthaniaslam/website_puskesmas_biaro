<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PegawaiPuskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PegawaiFavoritController extends Controller
{
    //
    public function pegawaiFavorit($id){
        // return [
        //     $id, 
        //     Crypt::decrypt($id),
        // ];
        $data = PegawaiPuskesmas::where('id_pegawai', Crypt::decrypt($id))->first();

        $data->is_favorit = ($data->is_favorit == 1) ? 0 : 1;
        $data->save();

        return redirect('admin-puskesmas/pegawai_puskesmas');
    }
}
