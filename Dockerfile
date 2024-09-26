# Fase de construção
FROM node:16 as node-build

# Instalar Node.js e npm
RUN npm install -g npm

# Fase final
FROM richarvey/nginx-php-fpm:latest

# Copiar o Node.js da fase anterior
COPY --from=node-build /usr/local/bin/node /usr/local/bin/
COPY --from=node-build /usr/local/bin/npm /usr/local/bin/

# Configurar Laravel e a aplicação
COPY . /var/www/html

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