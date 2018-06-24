<?php
declare(strict_types = 1);

namespace app\models\elasticsearch\observers\album;

use app\models\Album;
use app\models\elasticsearch\Album as ElasticAlbum;
use yii\db\AfterSaveEvent;

class Document
{
    /**
     * @param AfterSaveEvent $event
     */
    public function index(AfterSaveEvent $event): void
    {
        $elasticAlbum = new ElasticAlbum();

        /** @var Album $album */
        $album = $event->sender;
        $elasticAlbum->indexDocument($album);
    }
}
