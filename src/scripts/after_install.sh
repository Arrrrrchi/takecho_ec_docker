#!/bin/bash

set -eux

cd ~/takecho-ec/src
php artisan migrate --force
php artisan storage:link
php artisan config:cache
