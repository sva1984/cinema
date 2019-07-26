<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%user}}`
 */
class m190726_093743_create_junction_table_for_film_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_user}}', [
            'film_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(film_id, user_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-film_user-film_id}}',
            '{{%film_user}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-film_user-film_id}}',
            '{{%film_user}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-film_user-user_id}}',
            '{{%film_user}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-film_user-user_id}}',
            '{{%film_user}}',
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
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-film_user-film_id}}',
            '{{%film_user}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-film_user-film_id}}',
            '{{%film_user}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-film_user-user_id}}',
            '{{%film_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-film_user-user_id}}',
            '{{%film_user}}'
        );

        $this->dropTable('{{%film_user}}');
    }
}
