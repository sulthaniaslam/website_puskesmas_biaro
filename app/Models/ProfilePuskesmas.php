<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePuskesmas extends Model
{
    use HasFactory;

    protected $table = 'profile_puskesmas';

    protected $primaryKey = 'id_profile_puskesmas';

    protected $guarded = [
        'id_profile_puskesmas'
    ];
}
