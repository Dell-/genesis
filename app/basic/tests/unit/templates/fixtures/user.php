<?php

/** @var int $index */

return [
    'username' => 'username' . $index,
    'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('password'),
    'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
    'created_at' => time(),
    'updated_at' => time(),
];
