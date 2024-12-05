#!/usr/bin/env bash
echo "Installing Node.js dependencies..."
cd /var/www/html
npm install

echo "Building assets with Breeze..."

npm run build

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html
composer require barryvdh/laravel-dompdf

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force 

echo "Publishing cloudinary provider..."
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
php artisan vendor:publish --provider="CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider" --tag="cloudinary-laravel-config"

echo "Done!"
