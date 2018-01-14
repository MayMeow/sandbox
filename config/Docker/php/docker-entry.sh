#!/bin/bash

echo -ne "Update folder and files rights..."

if [ ! -f /var/www/html/vendor/autoload.php ]; then
    echo "Autoload file not found! Installing dependencies..."
    composer selfupdate
    # add --no-scripts if you have application preconfigured
    composer install --no-ansi --no-dev --no-interaction --no-progress  --optimize-autoloader
fi

echo "Wait until database $DB_HOST:$DB_PORT is ready..."
until nc -z $DB_HOST $DB_PORT
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
