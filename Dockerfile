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

# 4. Cấu hình Apache cho Fly.io (Ép trỏ vào thư mục public)
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Thay đổi DocumentRoot trong tất cả các file cấu hình của Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Đổi cổng sang 8080 cho Fly.io
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

# ... (Các bước 1-7 giữ nguyên)

# ... (Các bước trên giữ nguyên)

# Bước 8: Ép quyền và Rewrite (Sửa lại đoạn này)
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Ép Apache cho phép ghi đè cấu hình từ .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Bước 9: Khởi chạy
EXPOSE 8080
CMD ["apache2-foreground"]