<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPublik extends Model
{
    use HasFactory;

    protected $table = 'berkas_layanan_publik';

    protected $primaryKey = 'id_berkas_layanan_publik';

    protected $guarded = [
        'id_berkas_layanan_publik'
    ];
}
