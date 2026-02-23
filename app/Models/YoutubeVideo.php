<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeVideo extends Model
{
    protected $table    = 'youtube_videos';
    protected $fillable = ['title', 'video_url', 'order'];

    /**
     * Extract the YouTube video ID from various URL formats:
     *  - https://www.youtube.com/watch?v=VIDEO_ID
     *  - https://youtu.be/VIDEO_ID
     *  - https://www.youtube.com/embed/VIDEO_ID
     *  - Raw VIDEO_ID
     */
    public function getVideoIdAttribute(): string
    {
        $url = $this->video_url;
        // embed URL
        if (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/', $url, $m)) return $m[1];
        // watch URL
        if (preg_match('/[?&]v=([a-zA-Z0-9_-]{11})/', $url, $m)) return $m[1];
        // youtu.be short URL
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]{11})/', $url, $m)) return $m[1];
        // assume raw ID
        return $url;
    }

    public function getThumbnailAttribute(): string
    {
        return 'https://img.youtube.com/vi/' . $this->video_id . '/hqdefault.jpg';
    }
}
