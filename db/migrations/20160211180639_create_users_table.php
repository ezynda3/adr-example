<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('name', 'string', array('limit' => 20))
            ->addColumn('role', 'string', array('limit' => 40))
            ->addColumn('email', 'string', array('limit' => 100))
            ->addColumn('phone', 'string', array('limit' => 100))
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime', array('null' => true))
            ->save();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
