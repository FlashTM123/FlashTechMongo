# Sử dụng PHP 8.4 có Apache
FROM php:8.4-apache

# 1. Cài đặt các thư viện hệ thống
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libzip-dev \
    libssl-dev \
    zip \
    unzip \
    git \
    curl

# 2. Cài đặt các extension PHP
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# 3. Cài đặt Extension MongoDB
RUN pecl install mongodb && docker-php-ext-enable mongodb

# 4. Cấu hình Apache cho Fly.io (Chạy cổng 8080)
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# 5. Thiết lập thư mục làm việc
WORKDIR /var/www/html
COPY . .

# 6. Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 7. Cài đặt Node.js và Build Assets
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install && \
    npm run build

# 8. Cấp quyền và tạo link ảnh (QUAN TRỌNG ĐỂ HIỆN ẢNH)
RUN php artisan storage:link
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/storage
RUN chmod -R 775 /var/www/html/storage /var/www/html/public/storage

# 9. Fly.io dùng cổng 8080
EXPOSE 8080

CMD ["apache2-foreground"]