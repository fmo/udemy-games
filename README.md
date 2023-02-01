## DOCKER BUILD

docker build -t fmo/udemy-games .

docker run -d --rm -p 9201:8000 -v $(pwd):/app --name udemy-games fmo/udemy-games

## THIRD EPISODE

* add packages to dockerfile/rebuild
* composer require symfony/amqp-messenger
* transport to messenger.yaml
* check ./bin/console debug:autowiring mess
* check ./bin/console debug:messenger

## SECOND EPISODE

* Run the containers
* Install symfony messenger
* Create .env.local
* Account from cloudamqp
* Update .env.local with amqp credentials
