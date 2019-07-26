<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_prize}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%prize}}`
 */
class m190726_092823_create_junction_table_for_film_and_prize_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_prize}}', [
            'film_id' => $this->integer(),
            'prize_id' => $this->integer(),
            'PRIMARY KEY(film_id, prize_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-film_prize-film_id}}',
            '{{%film_prize}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-film_prize-film_id}}',
            '{{%film_prize}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `prize_id`
        $this->createIndex(
            '{{%idx-film_prize-prize_id}}',
            '{{%film_prize}}',
            'prize_id'
        );

        // add foreign key for table `{{%prize}}`
        $this->addForeignKey(
            '{{%fk-film_prize-prize_id}}',
            '{{%film_prize}}',
            'prize_id',
            '{{%prize}}',
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
            '{{%fk-film_prize-film_id}}',
            '{{%film_prize}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-film_prize-film_id}}',
            '{{%film_prize}}'
        );

        // drops foreign key for table `{{%prize}}`
        $this->dropForeignKey(
            '{{%fk-film_prize-prize_id}}',
            '{{%film_prize}}'
        );

        // drops index for column `prize_id`
        $this->dropIndex(
            '{{%idx-film_prize-prize_id}}',
            '{{%film_prize}}'
        );

        $this->dropTable('{{%film_prize}}');
    }
}
