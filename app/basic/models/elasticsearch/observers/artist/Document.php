<?php
declare(strict_types = 1);

namespace app\models\elasticsearch\observers\artist;

use app\models\Artist;
use app\models\elasticsearch\Artist as ElasticArtist;
use yii\db\AfterSaveEvent;

class Document
{
    /**
     * @param AfterSaveEvent $event
     */
    public function index(AfterSaveEvent $event): void
    {
        $elasticArtist = new ElasticArtist();

        /** @var Artist $artist */
        $artist = $event->sender;
        $elasticArtist->indexDocument($artist);
    }
}
