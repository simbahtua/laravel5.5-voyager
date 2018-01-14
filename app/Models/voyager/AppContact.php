<?php

namespace App\Models\voyager;

use Illuminate\Database\Eloquent\Model;

class AppContact extends Model
{
     protected $fillable = [
        'alamat',
        'facebook',
        'instagram',
        'twitter',
        'phone',
        'description',
        // add all other fields
    ];

    protected $table = 'app_contacts';
}
