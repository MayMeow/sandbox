<?php
use Migrations\AbstractMigration;

class CreateProjectSettingsTable extends AbstractMigration
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
        $table = $this->table('project_settings');
        $table->addColumn('project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('color', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('app_key', 'string', [
            'default' => null,
            'limit' => 32,
            'null' => false,
        ]);
        $table->addColumn('app_secret', 'string', [
            'default' => null,
            'limit' => 48,
            'null' => false,
        ]);
        $table->addColumn('spaces', 'boolean', [
            'default' => true,
            'null' => false,
        ]);
        $table->addColumn('environments', 'boolean', [
            'default' => true,
            'null' => false,
        ]);
        $table->addColumn('issues', 'boolean', [
            'default' => true,
            'null' => false,
        ]);
        $table->addColumn('dependencies_text', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
