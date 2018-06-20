<?php

namespace tests\unit\fixtures;

use app\modules\genre\models\Genre;
use yii\test\ActiveFixture;

class GenreFixture extends ActiveFixture
{
    public $modelClass = Genre::class;
}
