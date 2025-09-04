<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }
        
        return $this->permissions->contains('id', $permission->id);
    }

    public function hasAnyPermission($permissions)
    {
        if (is_string($permissions)) {
            return $this->hasPermission($permissions);
        }

        if (is_array($permissions)) {
            foreach ($permissions as $permission) {
                if ($this->hasPermission($permission)) {
                    return true;
                }
            }
            return false;
        }

        return $permissions->intersect($this->permissions)->isNotEmpty();
    }

    public function hasAllPermissions($permissions)
    {
        if (is_string($permissions)) {
            return $this->hasPermission($permissions);
        }

        if (is_array($permissions)) {
            foreach ($permissions as $permission) {
                if (!$this->hasPermission($permission)) {
                    return false;
                }
            }
            return true;
        }

        return $permissions->diff($this->permissions)->isEmpty();
    }
}
