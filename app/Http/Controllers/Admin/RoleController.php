<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Assign a role to a user and check permissions.
     *
     * @param int $userId
     * @param string $roleName
     * @return void
     */
    public function role_assign($userId, $roleName): void
    {
        // Find the user by ID
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            abort(404, 'User not found.');
        }

        // Find the role by name
        $role = Role::findByName($roleName);

        // Check if the role exists
        if (!$role) {
            abort(404, "Role '{$roleName}' does not exist.");
        }

        // Assign the role to the user
        $user->assignRole($role);

        // Check if the role has a specific permission
        if ($role->hasPermissionTo('edit')) {
            echo "The role '{$roleName}' has the 'edit' permission.";
        } else {
            echo "The role '{$roleName}' does not have the 'edit' permission.";
        }
    }
}