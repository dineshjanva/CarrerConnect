# Multi-stage Dockerfile for Laravel with Vite assets
# Stages: composer (vendor), node_builder (assets), final (php-fpm + nginx)

FROM composer:2 AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-scripts --no-interaction --no-progress
COPY . .
RUN composer dump-autoload --optimize

FROM node:20 AS node_builder
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm ci --silent
COPY resources resources
COPY vite.config.js .
RUN npm run build

FROM php:8.2-fpm
WORKDIR /var/www/html

# System deps for php extensions and nginx
RUN apt-get update && apt-get install -y \
	nginx \
	git \
	unzip \
	libzip-dev \
	libpng-dev \
	libjpeg-dev \
	libfreetype6-dev \
	libwebp-dev \
	zlib1g-dev \
	libicu-dev \
	ca-certificates \
	&& rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mbstring exif pcntl bcmath zip intl opcache

# Copy application (includes vendor created by composer stage)
COPY --from=composer /app /var/www/html

# Copy built assets from node stage
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Nginx configuration to serve Laravel public and pass PHP to php-fpm
RUN rm -f /etc/nginx/sites-enabled/default
RUN bash -lc "cat > /etc/nginx/conf.d/default.conf <<'NGINX'\nserver {\n    listen 80;\n    server_name _;\n    root /var/www/html/public;\n    index index.php index.html;\n\n    add_header X-Frame-Options \"SAMEORIGIN\";\n    add_header X-Content-Type-Options \"nosniff\";\n\n    location / {\n        try_files $uri $uri/ /index.php?$query_string;\n    }\n\n    location ~ \.php$ {\n        include fastcgi_params;\n        fastcgi_pass 127.0.0.1:9000;\n        fastcgi_index index.php;\n        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n        fastcgi_param PATH_INFO $fastcgi_path_info;\n    }\n\n    location ~* \\.(?:css|js|png|jpg|jpeg|gif|ico|svg|woff2?|eot|ttf)$ {\n        try_files $uri =404;\n        expires 30d;\n        access_log off;\n    }\n}\nNGINX"

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

ENV PATH="/var/www/html/vendor/bin:$PATH"

EXPOSE 80

CMD ["sh","-c","php-fpm -F & nginx -g 'daemon off;'" ]

