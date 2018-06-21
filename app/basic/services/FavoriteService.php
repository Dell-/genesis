<?php
declare(strict_types = 1);

namespace app\services;

use app\models\Favorite;
use app\spi\FavoriteInterface;
use app\spi\UserInterface;

class FavoriteService
{
    /**
     * @param UserInterface $user
     * @param FavoriteInterface $entity
     * @return Favorite
     */
    public function createFavorite(UserInterface $user, FavoriteInterface $entity): bool
    {
        $favorite = new Favorite();
        $favorite->setAttributes(
            [
                'user_id' => $user->getId(),
                'entity_id' => $entity->getId(),
                'type' => $entity->getType(),
            ]
        );

        return $favorite->save();
    }

    /**
     * @param UserInterface $user
     * @param FavoriteInterface $entity
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function removeFavorite(UserInterface $user, FavoriteInterface $entity): bool
    {
        $favorite = Favorite::findOne(
            [
                'user_id' => $user->getId(),
                'entity_id' => $entity->getId(),
                'type' => $entity->getType()
            ]
        );

        return $favorite ? (bool) $favorite->delete() : false;
    }
}
