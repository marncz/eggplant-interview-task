<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LookupEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'range_start',
        'range_end',
        'city',
        'region',
        'country_code',
    ];
}
