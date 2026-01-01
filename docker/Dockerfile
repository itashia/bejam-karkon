# =================================================================
# Stage 1: Composer dependencies
# =================================================================
FROM serversideup/php:8.4-fpm-nginx AS base

USER root

RUN install-php-extensions intl exif ldap

COPY composer.json composer.lock ./
RUN composer install --no-plugins --no-scripts --no-interaction --no-progress --optimize-autoloader

COPY --chmod=755 docker/entrypoint.d /etc/entrypoint.d
COPY --chmod=755 docker/services /etc/services.d

COPY --chown=www-data:www-data . .
RUN chmod -R 755 . && chmod +x /etc/services.d/*

# =================================================================
# Stage 2: Frontend assets compilation
# =================================================================
FROM serversideup/php:8.4-fpm-nginx AS frontend-assets

WORKDIR /app

COPY --from=base /var/www/html/resources ./resources
COPY --from=base /var/www/html/vendor ./vendor

COPY --chown=www-data:www-data . .

# =================================================================
# Stage 3: Production image
# =================================================================
FROM serversideup/php:8.4-fpm-nginx AS production

USER root

RUN install-php-extensions intl ldap \
    && apt-get update \
    && apt-get install -y netcat-openbsd iputils-ping \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=frontend-assets /app/public/build ./public/build
COPY --from=base /var/www/html ./
COPY --from=base /etc/entrypoint.d /etc/entrypoint.d
COPY --from=base /etc/services.d /etc/services.d

RUN composer dump-autoload --optimize \
    && chmod -R u+rwX,go-w storage bootstrap/cache

RUN echo "alias ll='ls -al'" >> /etc/bash.bashrc && \
    echo "alias a='php artisan'" >> /etc/bash.bashrc && \
    echo "alias logs='tail -n 100 -f storage/logs/laravel.log'" >> /etc/bash.bashrc && \
    echo "alias amfs='a migrate:fresh --seed'" >> /etc/bash.bashrc

USER www-data

# =================================================================
# Stage 4: Development image
# =================================================================
FROM serversideup/php:8.4-fpm-nginx AS development

USER root

RUN install-php-extensions intl exif ldap \
    && apt-get update \
    && apt-get install -y iputils-ping curl gnupg \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN echo "alias ll='ls -al'" >> /etc/bash.bashrc && \
    echo "alias a='php artisan'" >> /etc/bash.bashrc && \
    echo "alias c='composer'" >> /etc/bash.bashrc && \
    echo "alias logs='tail -n 100 -f storage/logs/laravel.log'" >> /etc/bash.bashrc && \
    echo "alias amfs='a migrate:fresh --seed'" >> /etc/bash.bashrc && \
    echo "alias aoc='a optimize:clear'" >> /etc/bash.bashrc && \
    echo "alias am:fi-r='a make:filament-resource'" >> /etc/bash.bashrc && \
    echo "alias am:fi-rm='a make:filament-relation-manager'" >> /etc/bash.bashrc && \
    echo "alias am:fi-w='a make:filament-widget'" >> /etc/bash.bashrc

USER www-data
