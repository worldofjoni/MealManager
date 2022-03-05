FROM php:8-apache

COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY apache/start-apache /usr/local/bin/
RUN chmod 755 /usr/local/bin/start-apache
RUN a2enmod rewrite

# Copy application source
COPY . /var/www/
RUN chown -R www-data:www-data /var/www

RUN docker-php-ext-install pdo_mysql

ENV DB_HOST=192.168.178.81
ENV DB_USER=user
ENV DB_PW=password
ENV DB_NAME=mealmanager


EXPOSE 80
EXPOSE 3306

CMD ["start-apache"]