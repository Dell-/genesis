<?php

namespace app\modules\track\models;

use app\modules\album\models\Album;
use app\modules\artist\models\Artist;
use app\modules\genre\models\Genre;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%track}}".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Artist[] $artists
 * @property Album[] $albums
 * @property Genre[] $genres
 */
class Track extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%track}}';
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
            ->viaTable('{{%artist_track}}', ['track_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::class, ['id' => 'album_id'])
            ->viaTable('{{%track_album}}', ['track_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::class, ['id' => 'genre_id'])
            ->viaTable('{{%track_genre}}', ['track_id' => 'id']);
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
            'albums',
            'genres',
        ];
    }
}
