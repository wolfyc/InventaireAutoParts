# Use the official PHP image with Apache
FROM php:apache

# Install PDO MySQL driver
RUN docker-php-ext-install pdo_mysql

# Enable the PDO MySQL extension
RUN docker-php-ext-enable pdo_mysql

# Copy the Apache configuration file into the container
COPY config/000-default.conf /etc/apache2/sites-available/000-default.conf

# Set the appropriate permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

