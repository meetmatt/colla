FROM nginx:1.18.0-alpine

# leave only /etc/nginx/mime.types
RUN mkdir /etc/nginx-tmp \
    && cp /etc/nginx/mime.types /etc/nginx-tmp/mime.types \
    && mv /etc/nginx-tmp /etc/nginx

# route logs to stdout/stderr
RUN ln -s /dev/stdout /var/log/nginx/index-access.log \
    && ln -s /dev/stdout /var/log/nginx/static-access.log \
    && ln -s /dev/stdout /var/log/nginx/api-access.log

# add dev configs
ADD fastcgi.conf /etc/nginx/fastcgi.conf
ADD nginx.conf /etc/nginx/nginx.conf


