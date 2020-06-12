# Dating site

### Setup instructions
Create a new database. Within the directory, rename .env.example to .env and fill out information regarding database and mailing.
Run the following commands:
```
composer install
php artisan key:generate
php artisan storage:link
php artisan migrate
```
If you wish to generate users you can use `php artisan db:seed` to generate 100 users by default.
