<?php
declare(strict_types = 1);

namespace app\components\elasticsearch\response\delete;

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
     * @return Index
     */
    public function build(): Index
    {
        try {
            if ($this->acknowledged === null) {
                throw new \InvalidArgumentException('All methods for set arguments must be called.');
            }

            return new Index($this->acknowledged);
        } finally {
            $this->acknowledged = null;
        }
    }
}
