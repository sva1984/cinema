<?php

use yii\db\Migration;

/**
 * Handles adding position to table `{{%film}}`.
 */
class m190726_101738_add_position_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'video_url', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%film}}', 'video_url');
    }
}
