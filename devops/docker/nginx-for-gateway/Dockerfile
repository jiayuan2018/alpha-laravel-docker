FROM nginx:1.11

#COPY Shanghai /usr/share/zoneinfo/Asia/Shanghai
#RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

COPY nginx.conf /etc/nginx/nginx.conf
COPY docker-sites /etc/nginx/docker-sites
COPY ssl-cert /etc/nginx/ssl-cert
COPY archive.sh /opt/archive.sh
COPY run.sh /usr/local/bin/run.sh
COPY crontab-gateway-nginx /opt/crontab
