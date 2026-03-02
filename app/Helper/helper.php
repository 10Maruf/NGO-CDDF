<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function application()
{
    if (!Schema::hasTable('applications')) {
        // Return a safe default object so views don't crash during testing
        return (object)[
            'name'            => 'CDDF',
            'main_logo'       => null,
            'fav_icon'        => null,
            'facebook'        => null,
            'twitter'         => null,
            'instagram'       => null,
            'youtube'         => null,
        ];
    }
    return DB::table('applications')->first();
}









