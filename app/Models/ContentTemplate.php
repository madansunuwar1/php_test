<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['template_title', 'template_name'];

    public function section()
    {
        $this->belongsToMany(PageSection::class);
    }
}
