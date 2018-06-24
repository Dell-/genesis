<?php
declare(strict_types = 1);

namespace app\components\elasticsearch;

use app\components\elasticsearch\response\create\Index as CreateIndex;
use app\components\elasticsearch\response\delete\Index as DeleteIndex;
use app\components\elasticsearch\response\create\IndexBuilder as CreateIndexBuilder;
use app\components\elasticsearch\response\delete\IndexBuilder as DeleteIndexBuilder;
use Elasticsearch\Client as BaseClient;
use Elasticsearch\ClientBuilder;
use yii\base\Component;

class Client extends Component
{
    /**
     * @var array
     */
    public $hosts = [];

    /**
     * @var BaseClient
     */
    private $client;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->client = ClientBuilder::create()
            ->setHosts($this->hosts)
            ->build();
    }

    /**
     * @param array $params
     * @return CreateIndex
     */
    public function createIndex(array $params): ?CreateIndex
    {
        try {
            $response = $this->client->indices()->create($params);

            return (new CreateIndexBuilder())->setAcknowledged($response)
                ->setShardsAcknowledged($response)
                ->setIndex($response)
                ->build();
        } catch (\Throwable $exception) {

            return null;
        }
    }

    /**
     * @param array $params
     * @return DeleteIndex
     */
    public function deleteIndex(array $params): ?DeleteIndex
    {
        try {
            $response = $this->client->indices()->delete($params);

            return (new DeleteIndexBuilder())->setAcknowledged($response)
                ->build();

        } catch (\Throwable $exception) {

            return null;
        }
    }

    /**
     * @param array $params
     * @return array
     *
     * TODO: need upgrade
     */
    public function indexDocument(array $params)
    {
        $response = $this->client->index($params);

        return $response;
    }
}
