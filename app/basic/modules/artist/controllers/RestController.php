<?php

namespace app\modules\artist\controllers;

use app\components\rest\Controller;
use app\modules\artist\models\Artist;

class RestController extends Controller
{
    public $modelClass = Artist::class;
}
