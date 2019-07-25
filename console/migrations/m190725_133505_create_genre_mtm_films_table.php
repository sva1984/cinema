<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%genre_mtm_films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%genres}}`
 */
class m190725_133505_create_genre_mtm_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%genre_mtm_films}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-genre_mtm_films-film_id}}',
            '{{%genre_mtm_films}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-genre_mtm_films-film_id}}',
            '{{%genre_mtm_films}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-genre_mtm_films-genre_id}}',
            '{{%genre_mtm_films}}',
            'genre_id'
        );

        // add foreign key for table `{{%genres}}`
        $this->addForeignKey(
            '{{%fk-genre_mtm_films-genre_id}}',
            '{{%genre_mtm_films}}',
            'genre_id',
            '{{%genres}}',
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
            '{{%fk-genre_mtm_films-film_id}}',
            '{{%genre_mtm_films}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-genre_mtm_films-film_id}}',
            '{{%genre_mtm_films}}'
        );

        // drops foreign key for table `{{%genres}}`
        $this->dropForeignKey(
            '{{%fk-genre_mtm_films-genre_id}}',
            '{{%genre_mtm_films}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-genre_mtm_films-genre_id}}',
            '{{%genre_mtm_films}}'
        );

        $this->dropTable('{{%genre_mtm_films}}');
    }
}
