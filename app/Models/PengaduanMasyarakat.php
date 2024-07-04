<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanMasyarakat extends Model
{
    use HasFactory;

    protected $table = 'pengaduan_masyarakat';

    protected $primaryKey = 'id_pengaduan_masyarakat';

    protected $guarded = [
        'id_pengaduan_masyarakat'
    ];
}
