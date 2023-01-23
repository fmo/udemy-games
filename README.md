## DOCKER BUILD

docker build -t fmo/udemy-games .

docker run -d --rm -p 9201:8000 -v $(pwd):/app --name udemy-games fmo/udemy-games

