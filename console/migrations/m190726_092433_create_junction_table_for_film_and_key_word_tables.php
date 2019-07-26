<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_key_word}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%key_word}}`
 */
class m190726_092433_create_junction_table_for_film_and_key_word_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_key_word}}', [
            'film_id' => $this->integer(),
            'key_word_id' => $this->integer(),
            'PRIMARY KEY(film_id, key_word_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-film_key_word-film_id}}',
            '{{%film_key_word}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-film_key_word-film_id}}',
            '{{%film_key_word}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `key_word_id`
        $this->createIndex(
            '{{%idx-film_key_word-key_word_id}}',
            '{{%film_key_word}}',
            'key_word_id'
        );

        // add foreign key for table `{{%key_word}}`
        $this->addForeignKey(
            '{{%fk-film_key_word-key_word_id}}',
            '{{%film_key_word}}',
            'key_word_id',
            '{{%key_word}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-film_key_word-film_id}}',
            '{{%film_key_word}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-film_key_word-film_id}}',
            '{{%film_key_word}}'
        );

        // drops foreign key for table `{{%key_word}}`
        $this->dropForeignKey(
            '{{%fk-film_key_word-key_word_id}}',
            '{{%film_key_word}}'
        );

        // drops index for column `key_word_id`
        $this->dropIndex(
            '{{%idx-film_key_word-key_word_id}}',
            '{{%film_key_word}}'
        );

        $this->dropTable('{{%film_key_word}}');
    }
}
