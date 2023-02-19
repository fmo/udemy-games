#!/bin/bash

composer install --no-interaction

/app/bin/console doctrine:database:create

/app/bin/console make:migration -n

/app/bin/console doctrine:migrations:migrate -n

chmod -R 777 var

symfony server:start --port=8000
