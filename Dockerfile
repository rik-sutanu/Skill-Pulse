# Production Dockerfile for SkillPulse Platform
# Based on official PHP 8.2 with Apache web server
FROM php:8.2-apache

# Install required system libraries and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    zip \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    && docker-php-ext-install -j$(nproc) \
    zip \
    mbstring \
    bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache modules: rewrite, headers, deflate
RUN a2enmod rewrite headers deflate

# Allow .htaccess overrides in /var/www/html
RUN echo '<Directory /var/www/html/>\n\
    Options -Indexes +FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/skillpulse.conf \
    && a2enconf skillpulse

# Configure port flexibility (support PORT env variable on Cloud Run / Render)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Set working directory
WORKDIR /var/www/html

# Copy project source code
COPY . /var/www/html/

# Set secure file permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Expose default HTTP port
ENV PORT=80
EXPOSE 80

CMD ["apache2-foreground"]
