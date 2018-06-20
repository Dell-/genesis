<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class TrackAlbumFixture extends ActiveFixture
{
    public $tableName = '{{%track_album}}';

    public $depends = [TrackFixture::class, AlbumFixture::class];
}
