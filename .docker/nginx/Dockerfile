FROM nginx:alpine

RUN adduser -u 1000 -g 1000 -G www-data -D -H www-data

COPY ./.docker/nginx/sites /etc/nginx/conf.d
COPY ./.docker/nginx/nginx.conf /etc/nginx/

ENTRYPOINT ["nginx"]

EXPOSE 80
