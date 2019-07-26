<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%comment}}`
 */
class m190726_090124_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'comment' => $this->text()->notNull(),
            'film_id' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'parrent_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-comment-film_id}}',
            '{{%comment}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-comment-film_id}}',
            '{{%comment}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-comment-created_by}}',
            '{{%comment}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-created_by}}',
            '{{%comment}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-comment-updated_by}}',
            '{{%comment}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-updated_by}}',
            '{{%comment}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `parrent_id`
        $this->createIndex(
            '{{%idx-comment-parrent_id}}',
            '{{%comment}}',
            'parrent_id'
        );

        // add foreign key for table `{{%comment}}`
        $this->addForeignKey(
            '{{%fk-comment-parrent_id}}',
            '{{%comment}}',
            'parrent_id',
            '{{%comment}}',
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
            '{{%fk-comment-film_id}}',
            '{{%comment}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-comment-film_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-created_by}}',
            '{{%comment}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-comment-created_by}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-updated_by}}',
            '{{%comment}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-comment-updated_by}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%comment}}`
        $this->dropForeignKey(
            '{{%fk-comment-parrent_id}}',
            '{{%comment}}'
        );

        // drops index for column `parrent_id`
        $this->dropIndex(
            '{{%idx-comment-parrent_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
