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
COPY supervisor-example.ini /etc/supervisord.d/supervisor-ex.ini



# Mount the php-code
COPY laravel-app /opt/src/laravel-app
COPY app-vendor  /opt/src/laravel-app/vendor




