# Base image
FROM php:7.4-apache

# Install required extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html/

# Copy the application files to the container
COPY . /var/www/html/

EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
