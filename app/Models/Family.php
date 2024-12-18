<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'fullname', 'rooms', 'family_size',
        'check_in', 'check_out', 'linked', 'package_type', 'room_type'
    ];
}
