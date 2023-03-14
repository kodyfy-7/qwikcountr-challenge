# QwikCountr Challenge
<br>
## Usage <br>
Setup the repository <br>
```
git clone git@github.com:kodyfy-7/qwikcountr-challenge.git
cd qwikcountr-challenge
composer install
cp .env.example .env 
php artisan key:generate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```

## Usage <br>
Setup the repository <br>
```
git clone git@github.com:
cd laravel-sanctum-tutorial
composer install
cp .env.example .env 
php artisan key:generate
php artisan cache:clear && php artisan config:clear 
php artisan serve 
```


## Database Setup <br>
```
mysql;
create database qwikcountr_chal_db;
exit;
```


### Setup your database credentials in the ```.env``` file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qwikcountr_chal_db
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

### Migrate tables
```
php artisan migrate
```

### Seed data
```
php artisan db:seed
```