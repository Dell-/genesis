<?php
declare(strict_types = 1);

namespace app\components\elasticsearch\response\create;

/**
 * Class IndexBuilder
 */
class IndexBuilder
{
    /**
     * @var int
     */
    private $acknowledged;

    /**
     * @var int
     */
    private $shardsAcknowledged;

    /**
     * @var string
     */
    private $index;

    /**
     * @param array $params
     * @return IndexBuilder
     */
    public function setAcknowledged(array $params): IndexBuilder
    {
        if (!isset($params['acknowledged'])) {
            throw new \InvalidArgumentException('Key "acknowledged" does not exists.');
        }

        $this->acknowledged = (int) $params['acknowledged'];

        return $this;
    }

    /**
     * @param array $params
     * @return IndexBuilder
     */
    public function setShardsAcknowledged(array $params): IndexBuilder
    {
        if (!isset($params['shards_acknowledged'])) {
            throw new \InvalidArgumentException('Key "shards_acknowledged" does not exists.');
        }

        $this->shardsAcknowledged = (int) $params['shards_acknowledged'];

        return $this;
    }

    /**
     * @param array $params
     * @return IndexBuilder
     */
    public function setIndex(array $params): IndexBuilder
    {
        if (!isset($params['index'])) {
            throw new \InvalidArgumentException('Key "index" does not exists.');
        }

        $this->index = (string) $params['index'];

        return $this;
    }

    /**
     * @return Index
     */
    public function build(): Index
    {
        try {
            if (!isset($this->acknowledged, $this->shardsAcknowledged, $this->index)) {
                throw new \InvalidArgumentException('All methods for set arguments must be called.');
            }

            return new Index($this->acknowledged, $this->shardsAcknowledged, $this->index);
        } finally {
            $this->acknowledged = null;
            $this->shardsAcknowledged = null;
            $this->index = null;
        }
    }
}
