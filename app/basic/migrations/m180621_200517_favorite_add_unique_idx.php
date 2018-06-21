<?php

use yii\db\Migration;

/**
 * Class m180621_200517_favorite_add_unique_idx
 */
class m180621_200517_favorite_add_unique_idx extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('favorite_unique_idx', '{{%favorite}}', ['entity_id', 'type'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('favorite_unique_idx', '{{%favorite}}');
    }
}
