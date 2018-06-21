<?php

namespace app\spi;

interface FavoriteInterface
{
    public const TYPE_ARTIST = 1;
    public const TYPE_TRACK = 2;
    public const TYPE_ALBUM = 3;

    public function getId(): int;

    public function getType(): int;
}
