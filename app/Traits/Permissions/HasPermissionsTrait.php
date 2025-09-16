<?php

namespace App\Traits\Permissions;

use App\Models\User\Role;


trait HasPermissionsTrait
{
      public function roles()
    {

        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission)
    {

        return (bool) $this->permissions->where('name', $permission->name)->count();
    }


    public function hasPermissionTo($permissions)
    {
        return $this->hasPermission($permissions) || $this->hasPermissionThroughRole($permissions);
    }


    public function hasPermissionThroughRole($permissions){

        foreach ($permissions->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

     public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }
}
