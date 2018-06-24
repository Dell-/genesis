<?php
declare(strict_types = 1);

namespace app\commands;

use app\models\elasticsearch\Album;
use app\models\elasticsearch\Artist;
use app\models\elasticsearch\Genre;
use app\models\elasticsearch\Track;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class ElasticsearchController extends Controller
{
    /**
     * @return int
     */
    public function actionCreateIndex(): int
    {
        $result = [];

        $album = new Album();
        $result[Album::class] = $album->createIndex();

        $artist = new Artist();
        $result[Artist::class] = $artist->createIndex();

        $track = new Track();
        $result[Track::class] = $track->createIndex();

        $track = new Genre();
        $result[Genre::class] = $track->createIndex();

        $hasError = false;
        foreach ($result as $class => $response) {
            if ($response === null) {
                $hasError = true;
                $this->stdout($class . " - create index error.\n", Console::BOLD);
            }
        }

        return $hasError ? ExitCode::SOFTWARE : ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionDeleteIndex(): int
    {
        $result = [];

        $album = new Album();
        $result[Album::class] = $album->deleteIndex();

        $artist = new Artist();
        $result[Artist::class] = $artist->deleteIndex();

        $track = new Track();
        $result[Track::class] = $track->deleteIndex();

        $track = new Genre();
        $result[Genre::class] = $track->deleteIndex();

        $hasError = false;
        foreach ($result as $class => $response) {
            if ($response === null) {
                $hasError = true;
                $this->stdout($class . " - delete index error.\n", Console::BOLD);
            }
        }

        return $hasError ? ExitCode::SOFTWARE : ExitCode::OK;
    }
}
