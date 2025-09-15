<?php

namespace App\Traits\Permissions;

use App\Models\User\Role;


trait HasPermissionsTrait
{
      public function roles()
    {

        return $this->belongsToMany(Role::class);
    }

    public function hasPermissionTo($permission)
    {
        return (bool) $this->permission->where('name', $permission->name)->count();
    }


    public function hasPermissionToAny($permissions)
    {
        return $this->hasPermission($permissions) || $this->hasPermissionThroughRole($permissions);
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
