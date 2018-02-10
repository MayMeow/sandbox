<?php
use Migrations\AbstractMigration;

class CreateRolesUsersTable extends AbstractMigration
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
        $table = $this->table('roles_users');
        $table->addColumn('role_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addForeignKey('role_id', 'roles', 'id', ['delete'=> 'CASCADE']);

        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE']);

        $table->create();
    }
}
