<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prizes_mtm_films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%prizes}}`
 */
class m190725_140706_create_prizes_mtm_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prizes_mtm_films}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'prize_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-prizes_mtm_films-film_id}}',
            '{{%prizes_mtm_films}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-prizes_mtm_films-film_id}}',
            '{{%prizes_mtm_films}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `prize_id`
        $this->createIndex(
            '{{%idx-prizes_mtm_films-prize_id}}',
            '{{%prizes_mtm_films}}',
            'prize_id'
        );

        // add foreign key for table `{{%prizes}}`
        $this->addForeignKey(
            '{{%fk-prizes_mtm_films-prize_id}}',
            '{{%prizes_mtm_films}}',
            'prize_id',
            '{{%prizes}}',
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
            '{{%fk-prizes_mtm_films-film_id}}',
            '{{%prizes_mtm_films}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-prizes_mtm_films-film_id}}',
            '{{%prizes_mtm_films}}'
        );

        // drops foreign key for table `{{%prizes}}`
        $this->dropForeignKey(
            '{{%fk-prizes_mtm_films-prize_id}}',
            '{{%prizes_mtm_films}}'
        );

        // drops index for column `prize_id`
        $this->dropIndex(
            '{{%idx-prizes_mtm_films-prize_id}}',
            '{{%prizes_mtm_films}}'
        );

        $this->dropTable('{{%prizes_mtm_films}}');
    }
}
