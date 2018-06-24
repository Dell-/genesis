<?php
declare(strict_types = 1);

namespace app\models\elasticsearch\observers\genre;

use app\models\elasticsearch\Genre as ElasticGenre;
use app\models\Genre;
use yii\db\AfterSaveEvent;

class Document
{
    /**
     * @param AfterSaveEvent $event
     */
    public function index(AfterSaveEvent $event): void
    {
        $elasticGenre = new ElasticGenre();

        /** @var Genre $genre */
        $genre = $event->sender;
        $elasticGenre->indexDocument($genre);
    }
}
