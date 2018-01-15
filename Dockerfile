FROM alpine
MAINTAINER May Meow <themaymeow@gmail.com>

RUN wget https://dl.eff.org/certbot-auto && \
    chmod a+x certbot-auto

# copy all scripts
COPY . /var/www/html
