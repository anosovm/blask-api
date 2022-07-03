FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
    autoconf \
    make \
    git \
    gcc \
    libc-dev \
    libzip \
    libzip-dev \
    libpng-dev \
    oniguruma-dev \
    ffmpeg \
    supervisor \
    unzip \
    bash \
    nano \
    sudo

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    linux-headers \
    g++ \
    zlib-dev \
  && pecl install grpc protobuf \
  && docker-php-ext-enable grpc protobuf \
  && apk del .build-deps

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions \
    bcmath \
    pcntl \
    zip \
    gd \
    opcache \
    igbinary \
    pdo_pgsql \
    pdo_mysql \
    redis \
    imagick \
    xdebug

COPY ./.docker/php/serialize_precision.ini /usr/local/etc/php/conf.d/serialize_precision.ini
COPY ./.docker/php/docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 200M/' /usr/local/etc/php/php.ini-development && \
    sed -i 's/post_max_size = 8M/post_max_size = 250M/' /usr/local/etc/php/php.ini-development && \
    cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

ARG WORKDIR=/var/www/
ARG UID=1000
ARG GID=1000

RUN deluser www-data  && addgroup --gid ${GID} --system www-data \
    && adduser --uid ${UID} --system --ingroup www-data www-data \
    && chown -R www-data:www-data ${WORKDIR} /home/www-data

# Ставим отедельно для root
RUN bash -c "$(curl -fsSL https://raw.githubusercontent.com/ohmybash/oh-my-bash/master/tools/install.sh)" && \
sed -i 's/OSH_THEME="font"/OSH_THEME="agnoster"/' ~/.bashrc

USER www-data

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR ${WORKDIR}

# Стравим отдельно для www-data
RUN bash -c "$(curl -fsSL https://raw.githubusercontent.com/ohmybash/oh-my-bash/master/tools/install.sh)" && \
sed -i 's/OSH_THEME="font"/OSH_THEME="agnoster"/' ~/.bashrc

ENTRYPOINT ["php-fpm"]

EXPOSE 9000
