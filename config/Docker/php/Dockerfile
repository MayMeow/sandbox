FROM maymeow/php:fpm
MAINTAINER May Meow <themaymeow@gmail.com>

COPY docker-entry.sh /usr/local/bin/docker-entry
RUN chmod +x /usr/local/bin/docker-entry

CMD ["docker-entry"]
