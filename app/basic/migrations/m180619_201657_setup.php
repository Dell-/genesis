<?php

use yii\db\Migration;

/**
 * Class m180619_201657_setup
 */
class m180619_201657_setup extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $scheme = file_get_contents(\Yii::getAlias('@dump') . '/scheme.sql');
        \Yii::$app->db->createCommand($scheme)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180619_201657_setup cannot be reverted.\n";

        return false;
    }
}
