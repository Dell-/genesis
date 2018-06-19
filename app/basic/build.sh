#!/usr/bin/env bash

composer install --no-interaction --optimize-autoloader --no-progress

php yii migrate --interactive=0

yes "yes" | php yii fixture/generate user --count=5

yes "yes" | php yii fixture "*"
