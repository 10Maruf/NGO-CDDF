<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    public $timestamps = false;

    protected $fillable = ['name', 'image'];

    public function projects()
    {
        return $this->belongsToMany(
            \App\Models\Project::class,
            'project_partner',
            'partner_id',
            'project_id'
        );
    }
}
