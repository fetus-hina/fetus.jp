FROM alpine:latest
ADD conf/ /etc/h2o/
ADD entrypoint.sh /
RUN apk --no-cache add h2o && \
    chmod +x /entrypoint.sh
CMD ["/entrypoint.sh"]
EXPOSE 80
