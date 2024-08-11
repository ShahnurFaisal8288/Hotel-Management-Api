<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasPermissionsTrait;


class AdminAuth extends Authenticatable
{
    use HasFactory, HasPermissionsTrait;

    protected $guarded = [];
    public function Permission(){
        return $this->hasMany(Permission::class);
    }
    
}
