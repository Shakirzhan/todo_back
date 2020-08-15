<?php

use yii\db\Migration;

/**
 * Class m200718_184747_add_column_access_token
 */
class m200718_184747_add_column_access_token extends Migration
{

    const TABLE_NAME = 'user';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME,'access_token',$this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME,'access_token');
    }

}
