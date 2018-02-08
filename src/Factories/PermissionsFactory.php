<?php

namespace App\Factories;

use Cake\Network\Session;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\UnauthorizedException;

class PermissionsFactory {

    public static function can($action = null)
    {
        $session  = new Session();
        $authUser = $session->read('Auth.User');
        $permissionsTable = TableRegistry::get('permissions');
        $userTable = TableRegistry::get('users');

        // Find all roles assigned to permissions
        $permissions = $permissionsTable->find()->contain(['Roles'])->where(['Permissions.title' => $action]);

        //dd($permissions);

        foreach ($permissions as $permission) {
            //dd($permission->roles);
            // check if user has assigned same role as permissions
            if(!$userTable->hasRole($authUser['id'], $permission->roles)) {
                throw new UnauthorizedException();
            };
        }
    }
}