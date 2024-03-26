<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'content_templates_id', 'section_title', 'sub_title', 'section_slug', 'section_description', 'image', 'user_id', 'sort', 'icon'];

    public function page()
    {
        $this->belongsTo(Page::class);
    }

    public function templates()
    {
        return $this->hasOne(ContentTemplate::class, 'id', 'content_templates_id');
    }
}
