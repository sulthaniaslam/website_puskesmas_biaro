<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarStandarPelayanan extends Model
{
    use HasFactory;

    protected $table = 'gambar_standard_pelayanan';

    protected $primaryKey = 'id_gambar_standard_pelayanan';

    protected $guarded = [
        'id_gambar_standard_pelayanan'
    ];
}
