
## Установка

composer install

npm install

## Сборка фронтенда

npm run build

## Docker 

USER_ID=$(stat -c %u .)

GROUP_ID=$(stat -c %g .)

echo GROUP_ID=$GROUP_ID >> .env

docker-compose up -d
