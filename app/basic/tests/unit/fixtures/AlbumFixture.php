<?php

namespace tests\unit\fixtures;

use app\modules\album\models\Album;
use yii\test\ActiveFixture;

class AlbumFixture extends ActiveFixture
{
    public $modelClass = Album::class;
}
