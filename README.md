# QwikCountr Challenge
<br>

### Utilities
The following additional tools will be used during this tutorial

- [![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/18482867-065091b1-8fae-4ca4-a48c-866cc06d2ac2?action=collection%2Ffork&collection-url=entityId%3D18482867-065091b1-8fae-4ca4-a48c-866cc06d2ac2%26entityType%3Dcollection%26workspaceId%3D7c2031ad-a6fa-46d9-9326-ab06da209d9c) 
- [Postman API](https://api.postman.com/collections/26357972-c8207fa4-211b-4740-bea3-ad7725bf0739?access_key=PMAT-01GVGVN7V8C1MRNHHGGVY03NS7) 

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

### Seed category data
```
php artisan db:seed
```