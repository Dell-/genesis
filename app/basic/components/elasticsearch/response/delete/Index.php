<?php
declare(strict_types = 1);

namespace app\components\elasticsearch\response\delete;

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
     * Index constructor
     *
     * @param int $acknowledged
     */
    public function __construct(int $acknowledged)
    {
        $this->acknowledged = $acknowledged;
    }

    /**
     * @return int
     */
    public function getAcknowledged(): int
    {
        return $this->acknowledged;
    }
}
