<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Role;
use App\Model\Entity\Permission;

class CreateDefaultPermissions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $roleTable = TableRegistry::get('roles');
        $role = $roleTable->save(new Role(['title' => 'Administrator', 'label' => 'Server administrator']));

        $permissionTable = TableRegistry::get('permissions');
        $permission = $permissionTable->save(new Permission(['title' => 'posts-add', 'label' => 'can add posts']));

        $roleTable->revokePermissionTo($role, [$permission]);
    }
}
