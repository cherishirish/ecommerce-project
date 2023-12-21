# Giggles Wiggles

## About this project

A e-commerce website based on Laravel 10.x

## How to recover this project

```
git pull origin main

cd GigglesWiggles/giggles_wiggles

cp .env.exmaple .env

vim .env
APP_NAME='Giggles Wiggles'
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxx
DB_USERNAME=xxx
DB_PASSWORD=xxx
...

php artisan key:generate               # Generate the `APP_KEY` in .env

composer install                       # re-create ./vendor directory from composer.json
```

- Make it live on Server (in Production environment)

```
npm run build
```
Then configure Apache use `GigglesWiggles/giggles_wiggles` as Document_root dir.

or 

- Continue develop this project (in development environment)

```
npm install && npm run dev
```

## Credentials

Plese see ./database/seeders/DatabaseSeeder.php to see the normal user and admin user's credential.
