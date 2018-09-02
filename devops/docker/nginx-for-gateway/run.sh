#!/bin/bash

chmod +x /opt/crontab
crontab /opt/crontab
crond

nginx -g 'daemon off;'
