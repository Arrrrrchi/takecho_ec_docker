#!/bin/bash

set -eux

cd ~/takecho-ec/src
php artisan migrate --force
php artisan config:cache
