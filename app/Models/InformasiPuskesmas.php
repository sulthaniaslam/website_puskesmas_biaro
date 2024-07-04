<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPuskesmas extends Model
{
    use HasFactory;

    protected $table = 'informasi_puskesmas';

    protected $primaryKey = 'id_informasi_puskesmas';

    protected $guarded = [
        'id_informasi_puskesmas'
    ];
}
