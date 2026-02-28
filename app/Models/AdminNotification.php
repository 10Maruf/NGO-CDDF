<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;

    protected $table = 'admin_notifications';

    protected $fillable = [
        'type',
        'title',
        'message',
        'icon',
        'icon_color',
        'link',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    // ── Scopes ────────────────────────────────────────────

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // ── Helpers ───────────────────────────────────────────

    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Time elapsed since notification was created (e.g. "2 min ago").
     */
    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Notification type → Bootstrap badge color map.
     */
    public static function typeColors(): array
    {
        return [
            'donation'    => 'success',
            'volunteer'   => 'info',
            'message'     => 'primary',
            'subscriber'  => 'warning',
            'contact'     => 'primary',
            'project'     => 'secondary',
            'career'      => 'dark',
            'publication' => 'dark',
            'system'      => 'danger',
        ];
    }
}
