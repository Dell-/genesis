<?php

namespace app\modules\genre\controllers;

use app\components\rest\Controller;
use app\modules\genre\models\Genre;

class RestController extends Controller
{
    public $modelClass = Genre::class;
}
