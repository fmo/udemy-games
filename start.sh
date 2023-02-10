#!/bin/bash

PROJECT_PATH="/Users/fmo/Projects/udemy/guess-game/udemy-games"

rm ${PROJECT_PATH}/var/app.db
rm ${PROJECT_PATH}/migrations/*.php
docker-compose up -d
