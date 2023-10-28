# Usar una imagen de PHP 7.4.3
FROM php:7.4.3-fpm

# Instalar las dependencias requeridas
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar la aplicación Laravel al contenedor
COPY . /var/www/html

# Configurar PHP y extensiones
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Instalar las dependencias de Laravel
RUN composer install

# Exponer el puerto 9000
EXPOSE 9000

CMD ["php-fpm"]
