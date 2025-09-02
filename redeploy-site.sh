#!/bin/sh

echo "📦 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader
npm install && npm run build

echo "🧠 Caching Laravel config and routes..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "🗃️ Running database migrations..."
php artisan migrate --force

echo "✅ Deployment complete!"
