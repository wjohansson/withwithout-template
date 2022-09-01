FROM ohmy/apache-php8.0-prod

# We need root to make the following changes to the base image
USER root

ADD docker/php-xdebug.ini /php-xdebug.ini

RUN apt-get update && \
	apt-get install php8.0-xdebug && \
	usermod -u 1000 www-data && \
	groupmod -g 1000 www-data && \
	cat /php-xdebug.ini >> /etc/php/8.0/fpm/php.ini && \
	cat /php-xdebug.ini >> /etc/php/8.0/cli/php.ini && \
	chown -R www-data:www-data /var/log/

# Enable mod_brotli
RUN a2enmod brotli

# Disable opening URLs with fopen (including file_get_contents etc)
ENV PHP_ALLOW_URL_FOPEN Off

ENV XDEBUG_REMOTE_HOST 172.17.0.1
ENV XDEBUG_MAX_NESTING_LEVEL 500
ENV PHP_DISPLAY_ERRORS 1

# Disable opening URLs with fopen (including file_get_contents etc)
ENV PHP_ALLOW_URL_FOPEN Off

EXPOSE 80

WORKDIR /app

# Important! We don't want to run the container as root
USER www-data
