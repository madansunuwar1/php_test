<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
