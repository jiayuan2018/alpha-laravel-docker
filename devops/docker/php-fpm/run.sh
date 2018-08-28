#!/bin/bash
#/usr/sbin/rsyslogd
mkdir -p /var/log/crontab
env > /var/log/crontab/crontab.env

function run_dev() {
    chmod +x /opt/crontab
    crontab /opt/crontab
    cron -f &
}

function run_prod() {
    chmod +x /opt/crontab
    crontab /opt/crontab
    cron -f &
    /usr/local/bin/supervisord -c /etc/supervisord.conf
}

action=${1:-help}

if [ "$action" = "run_dev" ] || [ "$action" = "run_prod" ];
then
    $action "$@"
fi

/usr/local/sbin/php-fpm -R
