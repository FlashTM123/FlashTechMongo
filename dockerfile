# Sử dụng PHP 8.2 hoặc 8.3 để tương thích Filament v3
FROM php:8.2-apache

# Cài đặt các thư viện hệ thống (Bổ sung libicu cho intl và libzip cho zip)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libssl-dev

# Cài đặt extension PHP (Bổ sung intl và zip cho Filament)
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Cài đặt extension MongoDB
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Cấu hình Apache
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

WORKDIR /var/www/html
COPY . .

# Cài đặt Composer (Thêm --ignore-platform-reqs để tránh lỗi version cục bộ)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Cấp quyền
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]