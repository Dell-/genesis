<?php

namespace app\modules\rest\controllers;

use app\components\rest\Controller;
use app\models\Album;
use app\modules\rest\controllers\actions\CreateFavoriteAction;
use app\modules\rest\controllers\actions\RemoveFavoriteAction;

class AlbumController extends Controller
{
    /**
     * @inheritdoc
     */
    public $modelClass = Album::class;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return array_merge(
            [
                'create-favorite' => [
                    'class' => CreateFavoriteAction::class,
                    'modelClass' => $this->modelClass,
                    'checkAccess' => [$this, 'checkAccess'],
                ],
                'remove-favorite' => [
                    'class' => RemoveFavoriteAction::class,
                    'modelClass' => $this->modelClass,
                    'checkAccess' => [$this, 'checkAccess'],
                ]
            ],
            parent::actions()
        );
    }
}
