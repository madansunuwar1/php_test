<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionSetting extends Model
{
    use HasFactory;

    protected $fillable = ['page', 'section_title', 'sub_title', 'section_description', 'image', 'user_id', 'sort'];

}
