<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%key_words_mtm_films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%key_words}}`
 */
class m190725_142808_create_key_words_mtm_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%key_words_mtm_films}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'key_word' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-key_words_mtm_films-film_id}}',
            '{{%key_words_mtm_films}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-key_words_mtm_films-film_id}}',
            '{{%key_words_mtm_films}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `key_word`
        $this->createIndex(
            '{{%idx-key_words_mtm_films-key_word}}',
            '{{%key_words_mtm_films}}',
            'key_word'
        );

        // add foreign key for table `{{%key_words}}`
        $this->addForeignKey(
            '{{%fk-key_words_mtm_films-key_word}}',
            '{{%key_words_mtm_films}}',
            'key_word',
            '{{%key_words}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%films}}`
        $this->dropForeignKey(
            '{{%fk-key_words_mtm_films-film_id}}',
            '{{%key_words_mtm_films}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-key_words_mtm_films-film_id}}',
            '{{%key_words_mtm_films}}'
        );

        // drops foreign key for table `{{%key_words}}`
        $this->dropForeignKey(
            '{{%fk-key_words_mtm_films-key_word}}',
            '{{%key_words_mtm_films}}'
        );

        // drops index for column `key_word`
        $this->dropIndex(
            '{{%idx-key_words_mtm_films-key_word}}',
            '{{%key_words_mtm_films}}'
        );

        $this->dropTable('{{%key_words_mtm_films}}');
    }
}
