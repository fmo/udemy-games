FROM php:8.2-fpm

RUN apt-get update
RUN apt-get install -y librabbitmq-dev autoconf pkg-config libssl-dev libzip-dev git gcc make autoconf libc-dev vim unzip
RUN docker-php-ext-install bcmath sockets zip mysqli pdo pdo_mysql

RUN pecl install amqp xdebug \
    && docker-php-ext-enable amqp xdebug

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
RUN git config --global user.email "fmo@example.com" \
    && git config --global user.name "fmo"

WORKDIR /app

COPY . .

ENTRYPOINT ["/app/docker-entrypoint.sh"]
