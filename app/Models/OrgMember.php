<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgMember extends Model
{
    protected $table = 'org_members';

    protected $fillable = [
        'org_type',
        'name',
        'designation',
        'department',
        'bio',
        'photo',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'contact_number',
        'email',
        'message',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static $orgTypes = [
        'general_council'    => 'General Council (GC) — 21 Members',
        'executive_committee'=> 'Executive Committee (EC) — 07 Members',
        'advisory_council'   => 'Advisory Council — 03 Members',
        'executive_director' => 'Executive Director (ED)',
        'senior_management'  => 'Senior Management Team (SMT)',
        'mid_management'     => 'Mid-Level Management',
        'field_staff'        => 'Field & Frontline Staff',
        'support_staff'      => 'Support Staff',
    ];

    public static $orgTypeLabels = [
        'general_council'    => 'General Council (GC)',
        'executive_committee'=> 'Executive Committee (EC)',
        'advisory_council'   => 'Advisory Council',
        'executive_director' => 'Executive Director',
        'senior_management'  => 'Senior Management Team',
        'mid_management'     => 'Mid-Level Management',
        'field_staff'        => 'Field & Frontline Staff',
        'support_staff'      => 'Support Staff',
    ];

    // Photo folder per org_type
    public static function photoFolder(): string
    {
        return 'images/org_members';
    }

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo) {
            return asset('images/org_members/' . $this->photo);
        }
        return asset('img/testimonial.jpg');
    }
}
