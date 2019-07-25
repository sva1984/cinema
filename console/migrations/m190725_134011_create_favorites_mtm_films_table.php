<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorites_mtm_films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%user}}`
 */
class m190725_134011_create_favorites_mtm_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorites_mtm_films}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-favorites_mtm_films-film_id}}',
            '{{%favorites_mtm_films}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-favorites_mtm_films-film_id}}',
            '{{%favorites_mtm_films}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-favorites_mtm_films-user_id}}',
            '{{%favorites_mtm_films}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-favorites_mtm_films-user_id}}',
            '{{%favorites_mtm_films}}',
            'user_id',
            '{{%user}}',
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
            '{{%fk-favorites_mtm_films-film_id}}',
            '{{%favorites_mtm_films}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-favorites_mtm_films-film_id}}',
            '{{%favorites_mtm_films}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-favorites_mtm_films-user_id}}',
            '{{%favorites_mtm_films}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-favorites_mtm_films-user_id}}',
            '{{%favorites_mtm_films}}'
        );

        $this->dropTable('{{%favorites_mtm_films}}');
    }
}
