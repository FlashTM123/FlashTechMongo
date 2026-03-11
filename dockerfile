# Sử dụng PHP 8.2 có Apache (Phiên bản ổn định cho Filament v3)
FROM php:8.2-apache

# 1. Cài đặt các thư viện hệ thống cần thiết cho Laravel, Filament và MongoDB
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

# 2. Cài đặt các extension PHP quan trọng (Sửa lỗi ext-intl và ext-zip bạn gặp phải)
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# 3. Cài đặt Extension MongoDB (Bắt buộc cho dự án FlashTechMongo)
RUN pecl install mongodb && docker-php-ext-enable mongodb

# 4. Cấu hình Apache: Cho phép Rewrite để chạy được các Route của Laravel
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 5. Thiết lập thư mục làm việc và copy toàn bộ code vào
WORKDIR /var/www/html
COPY . .

# 6. Cài đặt Composer và các thư viện PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 7. Cài đặt Node.js và Build giao diện (Vite/CSS/JS)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install && \
    npm run build

# 8. Cấp quyền cho thư mục storage và cache (Quan trọng để tránh lỗi 500)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Railway sẽ tự động map cổng, nhưng Apache mặc định chạy 80
EXPOSE 80

CMD ["apache2-foreground"]