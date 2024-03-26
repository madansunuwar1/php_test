<?php

namespace App\Helper;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function getPageSections($page_id)
    {
        if (!Schema::hasTable('page_sections')) {
            return [];
        }
        return PageSection::where('page_id', $page_id)
            ->orderBy('sort', 'ASC')
            ->orderBy('id', 'DESC')
            ->with('templates')
            ->get();
    }
    public static function getUser($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    public static function getCurrentURL($index = 1): ?string
    {
        return Request::segment($index);
    }

    public static function uploadImage($request, $name, $customFolder = ''): string|null
    {
        if ($request->hasFile($name)) {
            $image = $request->file($name);
            return Storage::disk(env('FILESYSTEM_UPLOADS_DISK', 'uploads'))->put("/{$customFolder}", $image);
        }
        return null;
    }

    public static function getPageIdBy($where)
    {
        return Page::where($where)->value('id');
    }

    public static function generateSlug($section_title): string
    {
        return (implode('-', explode(' ', strtolower($section_title))));
    }

    public static function getPageSlugByID($id)
    {
        return Page::where('id', $id)->value('slug');
    }

    public static function getSection()
    {
        return PageSection::where('section_slug', self::getCurrentURL(2))->with('templates')->first();
    }
}
