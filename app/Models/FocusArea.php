<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FocusArea extends Model
{
    protected $table = 'focus_areas';

    protected $fillable = [
        'title',
        'description',
        'detail_description',
        'icon_class',
        'icon_path',
        'image_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function projects()
    {
        return $this->belongsToMany(
            \App\Models\Project::class,
            'project_focus_area',
            'focus_area_id',
            'project_id'
        );
    }
}
