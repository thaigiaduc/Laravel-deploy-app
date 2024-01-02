#!/bin/bash
cd /var/www/html

chgrp -R www-data /var/www/html/storage
chmod -R 770 /var/www/html/storage

cp .env.example .env

if [ -f .env ]; then
    ENVIRONMENT=$(grep -E '^APP_ENV=' .env | cut -d '=' -f2)
    if [ "$ENVIRONMENT" = "local" ]; then
        echo "Running composer install..."
        composer install
        echo "Composer install completed."
    else
        echo "Environment is not local. Skipping composer install."
    fi
else
    echo "No .env file found. Aborting."
fi

while ! php artisan migrate --force; do
    echo "waiting for database ready"
done

php artisan key:generate
php artisan cache:clear
php artisan view:clear

php-fpm