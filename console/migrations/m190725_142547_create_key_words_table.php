<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%key_words}}`.
 */
class m190725_142547_create_key_words_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%key_words}}', [
            'id' => $this->primaryKey(),
            'key_word' => $this->string(64)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%key_words}}');
    }
}
