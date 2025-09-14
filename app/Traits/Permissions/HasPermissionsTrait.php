<?php

namespace App\Traits\Permissions;


trait HasPermissionsTrait
{
    public function hasPermissionTo($permission)
    {
        return (bool) $this->permission->where('name', $permission->name)->count();
    }

    protected function hasRole(...$role)
    {
       foreach ($role as $role) {
           if ($this->roles()->conains('name', $role)) {
               return true;
           }
       }
       return false;
    }
}
