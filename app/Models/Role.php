<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name'];

    public const IS_ADMIN = 1;
    public const IS_BCIO = 2;
    public const IS_BCPN = 3;
}
