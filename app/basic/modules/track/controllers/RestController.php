<?php

namespace app\modules\track\controllers;

use app\components\rest\Controller;
use app\modules\track\models\Track;

class RestController extends Controller
{
    public $modelClass = Track::class;
}
