<?php
declare(strict_types = 1);

namespace app\models\elasticsearch;

use app\components\elasticsearch\Client;
use yii\base\Model;

class Track extends Model
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
            'index' => 'track',
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
            'index' => 'track'
        ];

        return $this->client->deleteIndex($params);
    }

    /**
     * @param \app\models\Track $track
     * @return array
     */
    public function indexDocument(\app\models\Track $track): array
    {
        $params = [
            'index' => 'track',
            'type' => 'string',
            'id' => $track->getId(),
            'body' => $track->toArray()
        ];

        return $this->client->indexDocument($params);
    }
}
