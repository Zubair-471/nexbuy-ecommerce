<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'module',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    public function scopeByModule($query, $module)
    {
        return $query->where('module', $module);
    }
}
