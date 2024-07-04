<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK_Kompensasi extends Model
{
    use HasFactory;

    protected $table = 'sk_kompensasi';

    protected $primaryKey = 'id_sk_kompensasi';

    protected $guarded = [
        'id_sk_kompensasi'
    ];
}
