<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff_mtm_films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%staff}}`
 */
class m190725_133002_create_staff_mtm_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff_mtm_films}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer(),
            'staff_id' => $this->integer(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-staff_mtm_films-film_id}}',
            '{{%staff_mtm_films}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-staff_mtm_films-film_id}}',
            '{{%staff_mtm_films}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `staff_id`
        $this->createIndex(
            '{{%idx-staff_mtm_films-staff_id}}',
            '{{%staff_mtm_films}}',
            'staff_id'
        );

        // add foreign key for table `{{%staff}}`
        $this->addForeignKey(
            '{{%fk-staff_mtm_films-staff_id}}',
            '{{%staff_mtm_films}}',
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
        // drops foreign key for table `{{%films}}`
        $this->dropForeignKey(
            '{{%fk-staff_mtm_films-film_id}}',
            '{{%staff_mtm_films}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-staff_mtm_films-film_id}}',
            '{{%staff_mtm_films}}'
        );

        // drops foreign key for table `{{%staff}}`
        $this->dropForeignKey(
            '{{%fk-staff_mtm_films-staff_id}}',
            '{{%staff_mtm_films}}'
        );

        // drops index for column `staff_id`
        $this->dropIndex(
            '{{%idx-staff_mtm_films-staff_id}}',
            '{{%staff_mtm_films}}'
        );

        $this->dropTable('{{%staff_mtm_films}}');
    }
}
