<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prize}}`.
 */
class m190726_090048_create_prize_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prize}}', [
            'id' => $this->primaryKey(),
            'prize' => $this->string(64)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prize}}');
    }
}
