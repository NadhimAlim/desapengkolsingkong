FROM php:8.3-fpm-alpine

# 1. Install dependensi sistem, Nginx, dan driver SQLite
RUN apk add --no-cache \
    nginx \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite-dev

# 2. Install ekstensi PHP yang dibutuhkan Laravel & SQLite
RUN docker-php-ext-install pdo_mysql pdo_sqlite bcmath gd

# 3. Ambil Composer versi terbaru
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Tentukan working directory di dalam container
WORKDIR /var/www/html

# 5. Copy seluruh file proyek ke dalam container
COPY . .

# 6. Jalankan instalasi dependensi PHP (Production Mode)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 7. Buat konfigurasi Nginx yang benar (UBAH KE PORT 80)
RUN echo 'server { \
    listen 80; \
    root /var/www/html/public; \
    index index.php index.html; \
    charset utf-8; \
    location / { \
        try_files $uri $uri/ /index.php?$query_string; \
    } \
    location ~ \.php$ { \
        try_files $uri =404; \
        fastcgi_split_path_info ^(.+\.php)(/.+)$; \
        fastcgi_pass 127.0.0.1:9000; \
        fastcgi_index index.php; \
        include fastcgi_params; \
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \
        fastcgi_param PATH_INFO $fastcgi_path_info; \
    } \
    error_page 404 /index.php; \
    location ~ /\.(?!well-known).* { \
        deny all; \
    } \
}' > /etc/nginx/http.d/default.conf

# 8. Atur hak akses folder storage dan database agar bisa ditulis (writable)
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html

# 9. Expose port 80 (Samakan dengan PHP Native)
EXPOSE 80

# 10. Sentuhan Akhir: Buat file database, beri izin folder penuh, bersihkan cache, lalu start
CMD mkdir -p /var/www/html/database /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views /var/www/html/storage/framework/cache \
    && touch /var/www/html/database/database.sqlite \
    && chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chown -R www-data:www-data /var/www/html \
    && php artisan config:clear \
    && php artisan migrate --force \
    && php artisan db:seed --force \
    && php-fpm -D \
    && nginx -g "daemon off;"