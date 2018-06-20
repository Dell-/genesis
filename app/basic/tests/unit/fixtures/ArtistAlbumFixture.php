<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ArtistAlbumFixture extends ActiveFixture
{
    public $tableName = '{{%artist_album}}';

    public $depends = [ArtistFixture::class, AlbumFixture::class];
}
