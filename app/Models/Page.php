<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'slug', 'parent_id', 'user_id', 'image', 'status'];

    public function sections()
    {
        return $this->hasMany(PageSection::class)->with('templates');
    }

    public function pageContents()
    {
        return $this->hasMany(PageContent::class);
    }

}
