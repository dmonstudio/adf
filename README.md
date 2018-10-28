# Prerequisit

- Docker
- Docker Compose
- Git LFS
  
# Start

Run `./start.sh` which is equivalent to

```bash
docker-compose up -d
docker-compose exec app sh
```

Then run migrations and seeders inside the container

```bash
php artisan migrate --seed
```

In a separate terminal, start the npm watcher
```bash
cd app/src
npm i
npm run watch
```

# Troubleshoot

*Are the containers running?*

`docker-compose ps` to find out

*Need to blow up the database?*

```bash
docker-compose exec app sh
php artisan migrate:refresh --seed
```

*Made a change to the config files?*
`docker-compose restart app` should pick it up
