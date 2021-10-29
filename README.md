# Project
### Recommended system requirements

```sh
php - 7.4
node - v12.14.1
npm - 6.13.4
mysql - 8
nginx - ^1.10.3
```


### Installation

After cloning the repository сreate `.env` file from `.env.example` and set needed configuration data.

```sh
APP_URL=
```

Run the following commands
```sh
$ composer install
$ php artisan key:generate
$ php artisan jwt:secret
$ php artisan config:cache
$ php artisan migrate
$ php artisan storage:link
$ npm i
$ npm run dev
```

##### Cron configuration

Some actions must be performed on a regular basis, such as a renewal of your subscription to Gmail inbox. To do this, you need to configure cron.
Enter the following line in crontab:
`* * * * * php /path/to/project/artisan schedule:run >> /dev/null 2>&1`


##### Websocket configuration in supervisor
Change `/path/to/project/` to your path
```sh
[program:project-websocket]
process_name=%(program_name)s_%(process_num)02d
command=php /path/to/project/artisan websocket:serve
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/path/to/project/storage/logs/socket.log
```
<hr>
