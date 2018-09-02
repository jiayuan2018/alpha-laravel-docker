FROM rosettas/alpha-php:7.2-fpm


# Install the base tools vim procps
# crontab
# supervisord
RUN apt-get update && apt-get install -y \
        vim \
        procps \
        cron \
        supervisor \
        && rm -rf /var/lib/apt/lists/*


# Create the supervisord init
COPY supervisord.conf /etc/supervisord.conf
RUN mkdir /etc/supervisord.d


# Mount the php-code
COPY app-vendor /opt/src/laravel-app/vendor
COPY laravel-app /opt/src/laravel-app



