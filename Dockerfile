# Fase de build do Node.js
FROM node:20 AS node-build

# Instalar npm mais recente
RUN npm install -g npm

# Fase final
FROM richarvey/nginx-php-fpm:latest

# Instalar dependências que o Node.js requer (usando apk para Alpine)
RUN apk update && apk add --no-cache \
    libssl1.1 \
    libstdc++ \
    && rm -rf /var/cache/apk/*

# Copiar Node.js e npm da fase anterior (binários e bibliotecas)
COPY --from=node-build /usr/local/bin /usr/local/bin/
COPY --from=node-build /usr/local/lib /usr/local/lib/
COPY --from=node-build /usr/local/include /usr/local/include/
COPY --from=node-build /usr/lib /usr/lib/

# Copiar código da aplicação
COPY . /var/www/html

# Configurar Laravel e a aplicação
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Comando inicial
CMD ["/start.sh"]
