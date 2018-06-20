<?php

namespace app\modules\artist\models;

use app\modules\album\models\Album;
use app\modules\track\models\Track;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%artist}}".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Album[] $albums
 * @property Track[] $tracks
 */
class Artist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%artist}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::class, ['id' => 'album_id'])
            ->viaTable('{{%artist_album}}', ['artist_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracks()
    {
        return $this->hasMany(Track::class, ['id' => 'track_id'])
            ->viaTable('{{%artist_track}}', ['artist_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'firstname',
            'lastname',
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [
            'albums',
            'tracks',
        ];
    }
}
