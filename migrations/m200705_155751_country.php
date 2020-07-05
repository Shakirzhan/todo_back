<?php

use yii\db\Migration;

/**
 * Class m200705_155751_country
 */
class m200705_155751_country extends Migration
{
    const TABLE_NAME = 'country';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

}
