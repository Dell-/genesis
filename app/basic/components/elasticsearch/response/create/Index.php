<?php
declare(strict_types = 1);

namespace app\components\elasticsearch\response\create;

/**
 * Class Index
 */
class Index
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
     * Index constructor
     *
     * @param int $acknowledged
     * @param int $shardsAcknowledged
     * @param string $index
     */
    public function __construct(int $acknowledged, int $shardsAcknowledged, string $index)
    {
        $this->acknowledged = $acknowledged;
        $this->shardsAcknowledged = $shardsAcknowledged;
        $this->index = $index;
    }

    /**
     * @return int
     */
    public function getAcknowledged(): int
    {
        return $this->acknowledged;
    }

    /**
     * @return int
     */
    public function getShardsAcknowledged(): int
    {
        return $this->shardsAcknowledged;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }
}
