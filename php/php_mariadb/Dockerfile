FROM php:8.0-apache

# Install system dependencies required for Composer
RUN apt-get update \
    && apt-get install -y sudo \
    && apt-get install -y git \
    && apt-get install -y zip \
    && apt-get install -y unzip

# to get the list of existing extensions in this image => docker run -it --rm php:8.0-fpm php -m
# installing additional PHP extensions using 'docker-php-ext-install' followed by the name of the extension
# FR -> installation d'extensions PHP supplémentaire en utilisant la commande 'docker-php-ext-install' suivie du nom de l'extension
RUN docker-php-ext-install pdo_mysql

# creating sudo enabled user alongside his home directory 
RUN useradd -G www-data,root -u 1000 -d /home/appuser appuser
RUN mkdir -p /home/appuser/.composer && \
    chown -R appuser:appuser /home/appuser

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=appuser:appuser . /var/www/html

# changing user 
USER appuser

# running Apache
CMD apache2-foreground
