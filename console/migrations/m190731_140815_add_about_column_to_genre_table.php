<?php

use yii\db\Migration;

/**
 * Handles adding about to table `{{%genre}}`.
 */
class m190731_140815_add_about_column_to_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%genre}}', 'about', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%genre}}', 'about');
    }
}
