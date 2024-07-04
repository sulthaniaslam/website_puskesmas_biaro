<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPelayanan extends Model
{
    use HasFactory;

    protected $table = 'tarif_pelayanan';
    protected $primaryKey = 'id_tarif_pelayanan';
    protected $fillable = [
        'gambar_tarif'
    ];
}
