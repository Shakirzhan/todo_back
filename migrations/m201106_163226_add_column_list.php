<?php

use yii\db\Migration;

/**
 * Class m201106_163226_add_column_list
 */
class m201106_163226_add_column_list extends Migration
{
    const TABLE_NAME = 'tasks';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, 'is_deleted', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME, 'is_deleted');
    }
}
