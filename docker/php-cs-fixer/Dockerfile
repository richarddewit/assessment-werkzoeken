FROM php:8.3-cli

RUN apt-get update && apt-get install -y git unzip

RUN curl -L https://cs.symfony.com/download/php-cs-fixer-v3.phar -o /usr/local/bin/php-cs-fixer && \
    chmod +x /usr/local/bin/php-cs-fixer

WORKDIR /app

ENTRYPOINT ["php-cs-fixer"]
