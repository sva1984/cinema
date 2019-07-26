<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_staff}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%staff}}`
 */
class m190726_100338_create_junction_table_for_film_and_staff_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_staff}}', [
            'film_id' => $this->integer(),
            'staff_id' => $this->integer(),
            'PRIMARY KEY(film_id, staff_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-film_staff-film_id}}',
            '{{%film_staff}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-film_staff-film_id}}',
            '{{%film_staff}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `staff_id`
        $this->createIndex(
            '{{%idx-film_staff-staff_id}}',
            '{{%film_staff}}',
            'staff_id'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-film_staff-staff_id}}',
            '{{%film_staff}}',
            'staff_id',
            '{{%staff}}',
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
            '{{%fk-film_staff-film_id}}',
            '{{%film_staff}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-film_staff-film_id}}',
            '{{%film_staff}}'
        );

        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-film_staff-staff_id}}',
            '{{%film_staff}}'
        );

        // drops index for column `staff_id`
        $this->dropIndex(
            '{{%idx-film_staff-staff_id}}',
            '{{%film_staff}}'
        );

        $this->dropTable('{{%film_staff}}');
    }
}
