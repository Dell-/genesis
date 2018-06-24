<?php
declare(strict_types = 1);

namespace app\models\elasticsearch;

use app\components\elasticsearch\Client;
use yii\base\Model;

class Genre extends Model
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        /** @var Client $client */
        $this->client = \Yii::$app->elasticsearch;
    }

    /**
     * @return \app\components\elasticsearch\response\create\Index|null
     */
    public function createIndex(): ?\app\components\elasticsearch\response\create\Index
    {
        $params = [
            'index' => 'genre',
            'body' => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];

        return $this->client->createIndex($params);
    }

    /**
     * @return \app\components\elasticsearch\response\delete\Index|null
     */
    public function deleteIndex(): ?\app\components\elasticsearch\response\delete\Index
    {
        $params = [
            'index' => 'genre'
        ];

        return $this->client->deleteIndex($params);
    }

    /**
     * @param \app\models\Album $genre
     * @return array
     */
    public function indexDocument(\app\models\Genre $genre): array
    {
        $params = [
            'index' => 'genre',
            'type' => 'string',
            'id' => $genre->getId(),
            'body' => $genre->toArray()
        ];

        return $this->client->indexDocument($params);
    }
}
