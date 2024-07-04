<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelayanan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pelayanan';

    protected $primaryKey = 'id_jenis_pelayanan';

    protected $guarded = [
        'id_jenis_pelayanan'
    ];
}
