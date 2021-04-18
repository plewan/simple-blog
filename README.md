# Simple blog

This simple blog will show posts from database and let you register new user.

## Configuration in development environment

```bash
$ composer install
$ npm install
$ yarn install
$ symfony run yarn encore dev
$ docker-compose up -d
$ symfony console doctrine:migration:migrate
$ symfony run psql < dump.sql
$ symfony server:start -d
$ symfony open:local
```
