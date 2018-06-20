<?php

namespace app\components\rest;

use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\RateLimiter;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Response;

class Controller extends ActiveController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'text/html' => Response::FORMAT_JSON,
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_JSON,
                ],
            ],
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Allow-Headers' => ['Content-Type', 'Authorization'],
                ],
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
            ],
            'verbFilter' => [
                'class' => VerbFilter::class,
                'actions' => $this->verbs(),
            ],
        ];
    }
}
