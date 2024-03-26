<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name'];

    public const IS_ADMIN = 2;
    public const IS_BCIO = 3;
    public const IS_BCPN = 4;
    public const IS_BCIO_MEMBER = 5;
    public const IS_BCPN_MEMBER = 6;
}
