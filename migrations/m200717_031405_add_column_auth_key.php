<?php

use yii\db\Migration;

/**
 * Class m200717_031405_add_column_auth_key
 */
class m200717_031405_add_column_auth_key extends Migration
{
    const TABLE_NAME = 'user';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME,'auth_key',$this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME,'auth_key');
    }
}
