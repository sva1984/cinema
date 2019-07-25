<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%countries}}`
 */
class m190725_124749_create_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'year' => $this->integer(),
            'duration' => $this->integer(),
            'country_id' => $this->integer(),
            'raiting' => $this->decimal(2,1),
            'raiting_mpaa' => $this->string(64),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-films-country_id}}',
            '{{%films}}',
            'country_id'
        );

        // add foreign key for table `{{%countries}}`
        $this->addForeignKey(
            '{{%fk-films-country_id}}',
            '{{%films}}',
            'country_id',
            '{{%countries}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%countries}}`
        $this->dropForeignKey(
            '{{%fk-films-country_id}}',
            '{{%films}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-films-country_id}}',
            '{{%films}}'
        );

        $this->dropTable('{{%films}}');
    }
}
