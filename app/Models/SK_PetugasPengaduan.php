<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_PetugasPengaduan extends Model
{
    use HasFactory;

    protected $table = 'sk_petugas_pengaduan';

    protected $primaryKey = 'id_sk_petugas_pengaduan';

    protected $guarded = [
        'id_sk_petugas_pengaduan'
    ];
}
