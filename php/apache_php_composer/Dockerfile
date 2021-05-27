# image pulled from DockerHub
FROM php:8.0-apache

# install necessary system dependencies to run composer
RUN apt-get update \
    && apt-get install -y sudo \
    && apt-get install -y git \
    && apt-get install -y zip \
    && apt-get install -y unzip

# get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# create system user ("appuser" with uid 1000) to run Composer commands
RUN useradd -G www-data,root -u 1000 -d /home/appuser appuser
RUN mkdir -p /home/appuser/.composer && \
    chown -R appuser:appuser /home/appuser

# copy existing application directory contents
COPY . /var/www/html
# copy existing application directory permissions
COPY --chown=appuser:appuser . /var/www/html

# changing user (because cannot run Composer as root)
USER appuser

# going to app' directory inside container
WORKDIR /var/www/html

# installing Composer deps, the vendor folder will only be populated inside the container
RUN composer install
# updating the autoloader
RUN composer dumpautoload -o

# running Apache
CMD apache2-foreground