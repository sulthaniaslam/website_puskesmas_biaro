<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanyaJawabController extends Controller
{
    //
    public function index(){
        $data['pertanyaan'] = DB::table('pertanyaan')->get();
        return view('backend.tanya_jawab.index', $data);
    }
}
