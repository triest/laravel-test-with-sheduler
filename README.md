http://localhost <br>
http://127.0.0.1:8081

127.0.0.1
mysql
default
secret

Запуск приложения
` cd laradock`

    docker-compose up -d nginx mysql workspace phpmyadmin  php-worker

`docker-compose exec workspace bash `

Запуск миграция

`php artisan migrate`

Запуск seeder:
`composer dump-autoload`
`php artisan db:seed`

Запуск очередей

`php artisan schedule:run`

` php artisan queue:listen`
 

