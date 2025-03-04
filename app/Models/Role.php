<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    /**
     * Get all users with this role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }

    /**
     * Count how many users have this role.
     */
    public function userCount()
    {
        return $this->users()->count();
    }

    /**
     * Check if this role has a specific permission.
     */
    public function hasSpecificPermission($permissionName)
    {
        return $this->hasPermissionTo($permissionName);
    }
}