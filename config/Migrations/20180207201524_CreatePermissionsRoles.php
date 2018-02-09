<?php
use Migrations\AbstractMigration;

class CreatePermissionsRoles extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('permissions_roles');
        $table->addColumn('role_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addForeignKey('role_id', 'roles', 'id', ['delete'=> 'CASCADE']);

        $table->addColumn('permission_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addForeignKey('permission_id', 'permissions', 'id', ['delete'=> 'CASCADE']);

        $table->create();
    }
}
