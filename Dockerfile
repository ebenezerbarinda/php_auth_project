FROM php:8.2-apache

# Enable mod_rewrite if needed
RUN a2enmod rewrite

# Copy entire project to /var/www/html
COPY public/ /var/www/html/
COPY includes/ /var/www/html/includes/
COPY db/ /var/www/html/db/

# Set proper permissions (optional)
RUN chown -R www-data:www-data /var/www/html