<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi_IKM extends Model
{
    use HasFactory;

    protected $table = 'publikasi_ikm';

    protected $primaryKey = 'id_publikasi_ikm';

    protected $guarded = [
        'id_publikasi_ikm'
    ];
}
