<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'page_sections_id', 'title', 'sub_title', 'content', 'image', 'user_id'];

    public function page()
    {
        $this->belongsTo(Page::class);
    }

    public function section()
    {
        $this->belongsTo(PageSection::class);
    }
}
