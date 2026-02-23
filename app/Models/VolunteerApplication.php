<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    protected $table = 'volunteer_applications';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'address',
        'skills',
        'message',
        'status',
    ];
}
