#!/bin/bash

echo -ne "Update folder and files rights..."

if [ ! -f /var/www/html/vendor/autoload.php ]; then
    echo "Autoload file not found! Installing dependencies..."
    composer selfupdate
    composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader
fi

echo "Wait until database $DB_HOST:5432 is ready..."
until nc -z $DB_HOST 5432
do
    sleep 1
done

# Wait to avoid "panic: Failed to open sql connection pq: the database system is starting up"
sleep 1

echo "Running migrations..."
cd /var/www/html
ls -la
bin/cake migrations migrate
bin/cake migrations status

echo "Starting server..."
php-fpm
