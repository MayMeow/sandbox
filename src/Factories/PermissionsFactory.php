<?php

namespace App\Factories;

use Cake\Http\Session;
use Cake\ORM\TableRegistry;
use Cake\Http\Exception\UnauthorizedException;

class PermissionsFactory
{

    /**
     * 
     */
    public static function can($action = null, $session = null)
    {
        $authUser = $session->read('Auth.User');
        $permissionsTable = TableRegistry::get('permissions');
        $userTable = TableRegistry::get('users');

        // If user is not authenticated return false
        if ($authUser == null) return false;

        // Find all roles assigned to permissions
        $permission = $permissionsTable->find()->contain(['Roles'])->where(['permissions.title' => $action])->first();

        // if cannot find permission return true
        if ($permission == null) {
            return true;
        }

        //dd($permission->roles);
        // check if user has assigned same role as permissions
        if (!$userTable->hasRole($authUser['id'], $permission->roles)) {
            //throw new UnauthorizedException('You are not authorized to this action.');
            return false;
        };

        return true;
    }
}
