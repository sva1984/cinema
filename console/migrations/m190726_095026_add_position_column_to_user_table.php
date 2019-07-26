<?php

use yii\db\Migration;

/**
 * Handles adding position to table `{{%user}}`.
 */
class m190726_095026_add_position_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'img_url', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'img_url');
    }
}
