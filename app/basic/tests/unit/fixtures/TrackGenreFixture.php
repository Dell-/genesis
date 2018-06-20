<?php

namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class TrackGenreFixture extends ActiveFixture
{
    public $tableName = '{{%track_genre}}';

    public $depends = [TrackFixture::class, GenreFixture::class];
}
