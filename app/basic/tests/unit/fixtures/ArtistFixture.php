<?php

namespace tests\unit\fixtures;

use app\modules\artist\models\Artist;
use yii\test\ActiveFixture;

class ArtistFixture extends ActiveFixture
{
    public $modelClass = Artist::class;
}
