# Sandbox

Appication is prepacked for using with docker. Pack include

* NGINX
* PHP 7.1 FPM
* PostgreSQL
* Redis
* This application

## Requirements

* docker
* docker-compose

For standalone installation you will need

* PHP 7.1 and up
* Database of your choise (MySQL, PostgreSQL, MSSQL, Sqlite)
* Webserver NGINX or Apache

## Installation

Download source code from https://github.com/MayMeow/sandbox

```bash
git pull https://github.com/MayMeow/sandbox.git
```

Copy default nginx configuration

```bash
cp config/Docker/nginx/nginx.conf.default config/Docker/nginx/nginx.conf
```

Build images

```bash
docker-compose build
```

Run your server

```bash
docker-compose up -d
```

If you want track actions in console run server with

```bash
docker-compose up
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'` Changes have to be as small as possible per commit.
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## Credits

* MayMeow

## License

MIT