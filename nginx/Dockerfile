FROM nginx:stable-alpine
 
WORKDIR /etc/nginx/conf.d
 
ADD /nginx/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
 
COPY laravel-app .


