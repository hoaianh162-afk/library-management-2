# 1. Base image PHP có sẵn Composer
FROM php:8.2-fpm

# 2. Cài đặt các thư viện cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 3. Copy Composer từ image composer chính thức
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# 4. Đặt thư mục làm việc
WORKDIR /var/www/html

# 5. Copy toàn bộ code Laravel vào container
COPY . .

# 6. Cài dependencies Laravel
RUN composer install --no-dev --optimize-autoloader
# ————————————————————————————————
# 1️⃣ Giai đoạn build PHP dependencies
# ————————————————————————————————
FROM composer:2.8 AS vendor

WORKDIR /app

# Copy file composer trước để tận dụng cache
COPY composer.json composer.lock ./

# Cài dependency PHP
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Copy toàn bộ project
COPY . .


# ————————————————————————————————
# 2️⃣ Giai đoạn build Frontend (nếu có Vite)
# ————————————————————————————————
FROM node:20 AS frontend
WORKDIR /app
COPY . .
RUN npm ci && npm run build || echo "Không có Vite hoặc build lỗi, bỏ qua."


# ————————————————————————————————
# 3️⃣ Giai đoạn chạy Laravel (Production)
# ————————————————————————————————
FROM php:8.2-fpm

# Cài extension và package cần thiết cho Laravel + Excel
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev zip \
    && docker-php-ext-install pdo_mysql zip gd \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && rm -rf /var/lib/apt/lists/*

# Copy code và vendor từ giai đoạn trước
WORKDIR /var/www/html
COPY --from=vendor /app ./

# Copy build frontend (nếu có)
COPY --from=frontend /app/public/build ./public/build

# Đảm bảo quyền ghi cho storage và cache
RUN chmod -R 777 storage bootstrap/cache

# Copy .env mẫu nếu chưa có (Render sẽ override bằng biến môi trường)
RUN cp .env.example .env || true

# Tạo key Laravel
RUN php artisan key:generate || true

# Port mà Laravel sẽ chạy
EXPOSE 8000

# ————————————————————————————————
# 4️⃣ Lệnh khởi động chính
# ————————————————————————————————
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000

# 7. Cấp quyền cho storage và cache
RUN chmod -R 775 storage bootstrap/cache

# 8. Expose cổng 8000 (Laravel serve mặc định)
EXPOSE 8000

# 9. Lệnh chạy Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
