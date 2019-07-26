<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 */
class m190726_085903_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'biography' => $this->text(),
            'birth_date' => $this->integer(),
            'hieght' => $this->integer(),
            'profession' => $this->boolean(),
            'country_id' => $this->integer(),
            'img_url' => $this->string(64)->notNull(),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-staff-country_id}}',
            '{{%staff}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-staff-country_id}}',
            '{{%staff}}',
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
            '{{%fk-staff-country_id}}',
            '{{%staff}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-staff-country_id}}',
            '{{%staff}}'
        );

        $this->dropTable('{{%staff}}');
    }
}
