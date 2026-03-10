# Sử dụng PHP 8.2 có sẵn Apache
FROM php:8.2-apache

# Cài đặt các thư viện hệ thống cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libssl-dev

# Cài đặt các extension PHP cần thiết cho Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài đặt extension MongoDB (Vì dự án của bạn dùng FlashTechMongo)
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Cấu hình Apache: Cho phép Rewrite để chạy được route Laravel
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Copy toàn bộ code vào container
WORKDIR /var/www/html
COPY . .

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Cấp quyền cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Render yêu cầu chạy ở cổng $PORT
EXPOSE 80

CMD ["apache2-foreground"]