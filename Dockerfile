FROM php:8.3-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install \
    zip \
    pdo \
    pdo_pgsql

# Increase PHP upload limits
RUN printf "upload_max_filesize=10M\npost_max_size=12M\nmemory_limit=256M\nmax_execution_time=120\nmax_input_time=120\n" \
    > /usr/local/etc/php/conf.d/uploads.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-interaction --prefer-dist

# Create required Laravel directories
RUN mkdir -p \
    storage/app/public/foods \
    bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["sh", "-c", "php artisan storage:link || true && php artisan migrate --seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]