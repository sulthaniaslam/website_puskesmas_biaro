<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarJenisPelayanan extends Model
{
    use HasFactory;

    protected $table = 'gambar_jenis_pelayanan';

    protected $primaryKey = 'id_gambar_jenis_pelayanan';

    protected $guarded = [
        'id_gambar_jenis_pelayanan'
    ];
}
