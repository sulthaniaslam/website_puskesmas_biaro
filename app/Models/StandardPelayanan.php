<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardPelayanan extends Model
{
    use HasFactory;

    protected $table = 'standard_pelayanan';

    protected $primaryKey = 'id_standard_pelayanan';

    protected $guarded = [
        'id_standard_pelayanan'
    ];
}
