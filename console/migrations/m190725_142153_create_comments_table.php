<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%comments}}`
 */
class m190725_142153_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
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
            '{{%idx-comments-film_id}}',
            '{{%comments}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-comments-film_id}}',
            '{{%comments}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-comments-created_by}}',
            '{{%comments}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comments-created_by}}',
            '{{%comments}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-comments-updated_by}}',
            '{{%comments}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comments-updated_by}}',
            '{{%comments}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `parrent_id`
        $this->createIndex(
            '{{%idx-comments-parrent_id}}',
            '{{%comments}}',
            'parrent_id'
        );

        // add foreign key for table `{{%comments}}`
        $this->addForeignKey(
            '{{%fk-comments-parrent_id}}',
            '{{%comments}}',
            'parrent_id',
            '{{%comments}}',
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
            '{{%fk-comments-film_id}}',
            '{{%comments}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-comments-film_id}}',
            '{{%comments}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comments-created_by}}',
            '{{%comments}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-comments-created_by}}',
            '{{%comments}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comments-updated_by}}',
            '{{%comments}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-comments-updated_by}}',
            '{{%comments}}'
        );

        // drops foreign key for table `{{%comments}}`
        $this->dropForeignKey(
            '{{%fk-comments-parrent_id}}',
            '{{%comments}}'
        );

        // drops index for column `parrent_id`
        $this->dropIndex(
            '{{%idx-comments-parrent_id}}',
            '{{%comments}}'
        );

        $this->dropTable('{{%comments}}');
    }
}
