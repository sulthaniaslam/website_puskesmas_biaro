<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MekanismeAlur extends Model
{
    use HasFactory;
    protected $table = 'mekanisme_alur';

    protected $primaryKey = 'id_mekanisme_alur';

    protected $guarded = [
        'id_mekanisme_alur'
    ];
}
