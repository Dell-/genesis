<?php
declare(strict_types = 1);

namespace app\models\elasticsearch\observers\track;

use app\models\elasticsearch\Track as ElasticTrack;
use app\models\Track;
use yii\db\AfterSaveEvent;

class Document
{
    /**
     * @param AfterSaveEvent $event
     */
    public function index(AfterSaveEvent $event): void
    {
        $elasticTrack = new ElasticTrack();

        /** @var Track $track */
        $track = $event->sender;
        $elasticTrack->indexDocument($track);
    }
}
