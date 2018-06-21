<?php

namespace app\models;

use app\spi\FavoriteInterface;

/**
 * This is the model class for table "{{%favorite}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $entity_id
 * @property int $type
 *
 * @property User $user
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%favorite}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'entity_id', 'type'], 'required'],
            [['user_id', 'entity_id', 'type'], 'integer'],
            [
                ['type'],
                'in',
                'range' => [
                    FavoriteInterface::TYPE_ARTIST,
                    FavoriteInterface::TYPE_TRACK,
                    FavoriteInterface::TYPE_ALBUM
                ]
            ],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['user_id' => 'id']
            ],
            [
                'entity_id',
                'unique',
                'attributes' => ['entity_id', 'type'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'entity_id' => 'Entity ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
