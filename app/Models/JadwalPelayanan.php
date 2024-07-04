<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelayanan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelayanan';

    protected $primaryKey = 'id_jadwal_pelayanan';

    protected $guarded = [
        'id_jadwal_pelayanan'
    ];
}
