<?php

namespace app\modules\album\controllers;

use app\components\rest\Controller;
use app\modules\album\models\Album;

class RestController extends Controller
{
    public $modelClass = Album::class;
}
