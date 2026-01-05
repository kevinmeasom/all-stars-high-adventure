FROM wordpress:6.5.2-fpm-alpine

# Install necessary packages, including linux-headers
RUN apk add --no-cache \
    $PHPIZE_DEPS \
    linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Ensure the PHP-FPM service is accessible
EXPOSE 9000
