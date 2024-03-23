<?php

namespace App\Helper;

use App\Models\SectionSetting;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function getSectionSettings($page)
    {
        if (!Schema::hasTable('section_settings')) {
            return [];
        }
        return SectionSetting::where(function ($query) use ($page) {
            $query->where('page', $page);
            $query->orWhere('page_id', $page);
        })->get();
    }

    public static function getCurrentURL($index = 1): ?string
    {
        return Request::segment($index);
    }

    public static function uploadImage($name, Request $request): ?bool
    {
        if ($request->hasFile($name)) {
            $image = $request->file($name);
            return Storage::disk(env('FILESYSTEM_UPLOADS_DISK', 'uploads'))->put('/', $image);
        }
        return null;
    }
}
