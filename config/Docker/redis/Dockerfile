FROM ubuntu:16.04
MAINTAINER May Meow <themaymeow@gmail.com>

RUN apt-get update && apt-get install -y redis-server
EXPOSE 6379

ENTRYPOINT  ["/usr/bin/redis-server"]
