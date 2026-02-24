<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'short_description',
        'detail_description',
        'status',
        'start_date',
        'end_date',
        'location',
        'budget',
        'beneficiary_count',
        'implementing_partner',
        'is_featured',
        'order',
        'is_active',
    ];

    protected $casts = [
        'start_date'       => 'date',
        'end_date'         => 'date',
        'is_featured'      => 'boolean',
        'is_active'        => 'boolean',
        'budget'           => 'decimal:2',
    ];

    // ── Relationships ─────────────────────────────────────────────────────────

    /**
     * Partners / Donors linked to this project.
     * Uses the `partners` table (int PK) — no Eloquent model exists yet,
     * so we handle via DB queries in the controller directly.
     * Pivot: project_partner (project_id, partner_id)
     */
    public function partners()
    {
        return $this->belongsToMany(
            \App\Models\Partner::class,
            'project_partner',
            'project_id',
            'partner_id'
        );
    }

    /**
     * Focus areas linked to this project.
     * Pivot: project_focus_area (project_id, focus_area_id)
     */
    public function focusAreas()
    {
        return $this->belongsToMany(
            \App\Models\FocusArea::class,
            'project_focus_area',
            'project_id',
            'focus_area_id'
        );
    }

    /**
     * Gallery images for this project.
     * Table: project_images (id, project_id, image)
     */
    public function galleryImages()
    {
        return $this->hasMany(\App\Models\ProjectImage::class, 'project_id');
    }

    // ── Accessors ─────────────────────────────────────────────────────────────

    public function getCoverImageUrlAttribute(): string
    {
        if ($this->cover_image) {
            return asset('images/project/' . $this->cover_image);
        }
        return asset('images/default_project.jpg');
    }

    // ── Slugging ──────────────────────────────────────────────────────────────

    public static function generateSlug(string $title, ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (
            static::where('slug', $slug)
                ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOngoing($query)
    {
        return $query->where('status', 'ongoing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
