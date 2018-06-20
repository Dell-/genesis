<?php

namespace app\modules\album\models;

use app\modules\artist\models\Artist;
use app\modules\track\models\Track;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%album}}"
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Artist[] $artists
 * @property Track[] $tracks
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%album}}';
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
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtists()
    {
        return $this->hasMany(Artist::class, ['id' => 'artist_id'])
            ->viaTable('{{%artist_album}}', ['album_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracks()
    {
        return $this->hasMany(Track::class, ['id' => 'track_id'])
            ->viaTable('{{%track_album}}', ['album_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'name',
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [
            'artists',
            'tracks',
        ];
    }
}
