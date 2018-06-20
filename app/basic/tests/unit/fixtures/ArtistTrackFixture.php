<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ArtistTrackFixture extends ActiveFixture
{
    public $tableName = '{{%artist_track}}';

    public $depends = [ArtistFixture::class, TrackFixture::class];
}
