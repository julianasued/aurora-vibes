FROM richarvey/nginx-php-fpm:latest

# Instalar Node.js e npm
RUN apk add --no-cache curl \
    && curl -sL https://unofficial-builds.nodejs.org/download/release/v16.x/node-v16.x-linux-x64-musl.tar.gz | tar -xz \
    && mv node-v16.x-linux-x64-musl /usr/local/node \
    && ln -s /usr/local/node/bin/node /usr/bin/node \
    && ln -s /usr/local/node/bin/npm /usr/bin/npm \
    && ln -s /usr/local/node/bin/npx /usr/bin/npx

# Copiar os arquivos do projeto
COPY . .

# Configurações da imagem
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configurações do Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Permitir que o composer rode como root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Definir o comando de inicialização
CMD ["/start.sh"]