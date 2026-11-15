FROM php:8.3-apache

RUN a2enmod rewrite

COPY deploy/apache-site.conf /etc/apache2/sites-available/000-default.conf
COPY app/ /var/www/html/app/
COPY assets/ /var/www/html/assets/
COPY images/logo-white.PNG /var/www/html/images/logo-white.PNG
COPY pages/ /var/www/html/pages/
COPY .htaccess index.php /var/www/html/

EXPOSE 80
