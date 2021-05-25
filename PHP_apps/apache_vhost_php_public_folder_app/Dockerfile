# image pulled from DockerHub
FROM php:8.0-apache

# create system user ("appuser" with uid 1000) to run Composer commands
RUN useradd -G www-data,root -u 1000 -d /home/appuser appuser
RUN mkdir -p /home/appuser/.composer && \
    chown -R appuser:appuser /home/appuser

# copy existing application directory contents
COPY . /var/www/html
# copy existing application directory permissions
COPY --chown=appuser:appuser . /var/www/html

# enabling Apache mod rewrite
RUN a2enmod rewrite

# copy Apache virtual host
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# changing user (because cannot run Composer as root)
USER appuser

# installing Composer deps and running Apache
CMD apache2-foreground