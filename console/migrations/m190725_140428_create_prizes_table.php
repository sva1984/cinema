<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prizes}}`.
 */
class m190725_140428_create_prizes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prizes}}', [
            'id' => $this->primaryKey(),
            'prize' => $this->string(64)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prizes}}');
    }
}
