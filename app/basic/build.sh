#!/usr/bin/env bash

composer install --no-interaction --optimize-autoloader --no-progress

php yii migrate --interactive=0

yes "yes" | php yii fixture/generate user --count=5
yes "yes" | php yii fixture/generate track --count=70
yes "yes" | php yii fixture/generate artist --count=7
yes "yes" | php yii fixture/generate album --count=7
yes "yes" | php yii fixture/generate genre --count=35
yes "yes" | php yii fixture/generate artist_album --count=7
yes "yes" | php yii fixture/generate artist_track --count=70
yes "yes" | php yii fixture/generate track_album --count=70
yes "yes" | php yii fixture/generate track_genre --count=70

yes "yes" | php yii fixture "*"
