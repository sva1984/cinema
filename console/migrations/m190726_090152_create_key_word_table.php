<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%key_word}}`.
 */
class m190726_090152_create_key_word_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%key_word}}', [
            'id' => $this->primaryKey(),
            'key_word' => $this->string(64)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%key_word}}');
    }
}
