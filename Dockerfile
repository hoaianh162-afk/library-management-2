# ==========================================
# 1️⃣ Stage 1: Cài PHP dependencies (Composer)
# ==========================================
FROM php:8.2-cli AS vendor

# Cài đặt các thư viện và composer
RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libjpeg-dev libfreetype6-dev libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

COPY . .
RUN composer dump-autoload --optimize



# ==========================================
# 2️⃣ Stage 2: Runtime
# ==========================================
FROM php:8.2-cli

WORKDIR /var/www/html

# Cài đặt các thư viện hệ thống và PHP extension cần thiết
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo_mysql gd zip bcmath \
  && rm -rf /var/lib/apt/lists/*

# Copy code và vendor từ stage trước
COPY --from=vendor /app /var/www/html

# ⚠️ Không có build frontend nên không copy public/build

# Phân quyền cho storage và bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache || true

# Thiết lập biến môi trường mặc định
ENV APP_ENV=production
ENV PORT=8000

EXPOSE 8000

# Lệnh khởi chạy chính
CMD sh -lc '\
  if [ -z "${APP_KEY}" ]; then php artisan key:generate --ansi || true; fi && \
  php artisan storage:link || true && \
  php artisan migrate --force || true && \
  php artisan serve --host=0.0.0.0 --port=${PORT:-8000} \
'
