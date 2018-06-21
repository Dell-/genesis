<?php

namespace app\modules\rest\controllers\actions;

use app\models\User;
use app\spi\FavoriteInterface;
use app\spi\UserInterface;
use app\services\FavoriteService;
use yii\rest\Action;
use yii\base\Controller;

class RemoveFavoriteAction extends Action
{
    /**
     * @var FavoriteService
     */
    private $service;

    /**
     * RemoveFavoriteAction constructor.
     * @param string $id
     * @param Controller $controller
     * @param FavoriteService $service
     * @param array $config
     */
    public function __construct($id, $controller, FavoriteService $service, array $config = [])
    {
        parent::__construct($id, $controller, $config);
        $this->service = $service;
    }

    public function run($id)
    {
        /** @var UserInterface $user */
        $user = User::findById(1);

        /** @var FavoriteInterface $entity */
        $entity = $this->findModel($id);

        return $this->service->removeFavorite($user, $entity);
    }
}
