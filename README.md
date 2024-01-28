

## Meteo App

### project setup
```
git clone repository

cd meteo-app

npm install

composer install

cp .env.example .env

php artisan key:generate
```
### database setup
```
create database meteo_db

update .env file with database credentials

php artisan migrate (or php artisan migrate:fresh)
```
### run project
```
php artisan serve

npm run dev
```

### collect data using artisan command
```
/* 
 * check app/Console/Commands/CollectMeteoData.php
 * latitude and longitude have default values you can change them
 */

php artisan meteo:collect 
 or 
php artisan meteo:collect 45.75 25.33
```
### collect data using scheduler  every 15 minutes
```
/* check app/Console/Kernel.php */
php artisan schedule:run
```
### collect  data using api route (GET) (queue job)
```
/* run queue worker (set QUEUE_CONNECTION=database) */

php artisan queue:work

/api/collect
```
###

### Fontend
```
/* check resources/js/pages/Dashboard.vue and web.php route file */
```
### Questions
```
contact me
```
