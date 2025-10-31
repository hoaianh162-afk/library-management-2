# ==========================================
# 1️⃣ Stage 1: Cài PHP dependencies (Composer)
# ==========================================
FROM composer:2.8 AS vendor

WORKDIR /app

# Dùng cache tốt hơn cho composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Copy toàn bộ source và tối ưu autoload (có classmap)
COPY . .
RUN composer dump-autoload --optimize

# ==========================================
# 2️⃣ Stage 2: Build Frontend (Vite nếu có)
# ==========================================
FROM node:20 AS frontend

WORKDIR /app
COPY . .

# Cài và build frontend nếu có package.json
RUN if [ -f package.json ]; then \
      if [ -f package-lock.json ]; then npm ci --no-audit --no-fund; else npm i --no-audit --no-fund; fi; \
      npm run build --if-present; \
    else \
      echo "Không có frontend để build, bỏ qua."; \
    fi

# ==========================================
# 3️⃣ Stage 3: Runtime (artisan serve đọc PORT)
# ==========================================
FROM php:8.2-cli

WORKDIR /var/www/html

# Cài các thư viện OS + PHP extensions
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo_mysql gd zip bcmath \
  && rm -rf /var/lib/apt/lists/*

# Copy code + vendor từ stage vendor
COPY --from=vendor /app /var/www/html

# Quyền ghi cho storage và bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache || true \
 && chmod -R 775 storage bootstrap/cache || true

# Thiết lập các biến mặc định (Render sẽ override)
ENV APP_ENV=production
ENV PORT=8000

EXPOSE 8000

# Khởi chạy: generate key nếu chưa có, migrate (bỏ qua lỗi), rồi serve theo PORT
CMD sh -lc '\
  if [ -z "${APP_KEY}" ]; then php artisan key:generate --ansi || true; fi && \
  php artisan storage:link || true && \
  php artisan migrate --force || true && \
  php artisan serve --host=0.0.0.0 --port=${PORT:-8000} \
'
