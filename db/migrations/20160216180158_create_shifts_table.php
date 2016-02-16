<?php

use Phinx\Migration\AbstractMigration;

class CreateShiftsTable extends AbstractMigration
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
        $shifts = $this->table('shifts');
        $shifts->addColumn('manager_id', 'integer')
            ->addColumn('employee_id', 'integer')
            ->addColumn('break', 'float')
            ->addColumn('start_time', 'datetime')
            ->addColumn('end_time', 'datetime')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime', array('null' => true))
            ->save();
    }

    public function down()
    {
        $this->dropTable('shifts');
    }
}
