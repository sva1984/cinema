<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 */
class m190726_085657_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'year' => $this->integer(),
            'duration' => $this->integer(),
            'country_id' => $this->integer(),
            'raiting' => $this->decimal(2,1),
            'raiting_mpaa' => $this->string(64),
            'img_url' => $this->string(64)->notNull(),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-film-country_id}}',
            '{{%film}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-film-country_id}}',
            '{{%film}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-film-country_id}}',
            '{{%film}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-film-country_id}}',
            '{{%film}}'
        );

        $this->dropTable('{{%film}}');
    }
}
