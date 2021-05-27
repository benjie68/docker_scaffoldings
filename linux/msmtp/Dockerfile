# image pulled from DockerHub
FROM php:8.0-apache

# update system dependencies
RUN apt-get update 

# installing email client
RUN apt-get install -y msmtp msmtp-mta

# create system user ("appuser" with uid 1000) 
RUN useradd -G www-data,root -u 1000 -d /home/appuser appuser
RUN mkdir -p /home/appuser/ && chown -R appuser:appuser /home/appuser

# copy existing application directory contents
COPY . /var/www/html
# copy existing application directory permissions
COPY --chown=appuser:appuser . /var/www/html

# copy Apache virtual host
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
# copy email settings
COPY ./msmtprc /etc/msmtprc

# installing Composer deps and running Apache
CMD apache2-foreground