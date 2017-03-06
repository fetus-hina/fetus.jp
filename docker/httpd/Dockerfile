FROM alpine:latest

ADD entrypoint.sh /

RUN apk --no-cache add \
        h2o \
        php7 \
        php7-cgi \
        php7-ctype \
        php7-curl \
        php7-intl \
        php7-json \
        php7-mbstring \
        php7-opcache \
        php7-openssl \
        php7-pdo \
        php7-pdo_pgsql \
        php7-session \
      && \
    chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]

EXPOSE 80

ADD conf/ /etc/h2o/

