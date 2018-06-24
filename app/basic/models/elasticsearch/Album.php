<?php
declare(strict_types = 1);

namespace app\models\elasticsearch;

use app\components\elasticsearch\Client;
use yii\base\Model;

class Album extends Model
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
            'index' => 'album',
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
            'index' => 'album'
        ];

        return $this->client->deleteIndex($params);
    }

    /**
     * @param \app\models\Album $album
     * @return array
     */
    public function indexDocument(\app\models\Album $album): array
    {
        $params = [
            'index' => 'album',
            'type' => 'string',
            'id' => $album->getId(),
            'body' => $album->toArray()
        ];

        return $this->client->indexDocument($params);
    }
}
