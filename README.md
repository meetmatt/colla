# Collaborative 360-degree review

## Project structure

Directories:
- `code` contains application code
    - `api` is a Symfony 4 API application
    - `frontend` is a Vue.js single-page application
- `infra` holds configuration and scripts related to application's infrastructure
    - `dev` used for local development
- `doc` contains documentation

## Installing

Requirements:
- PHP 7.2
- PDO MySQL extension
- Composer

```bash
cd code/api
composer install
```

## Running on dev

Requires Docker and Docker Compose.

```bash
echo '127.0.0.1	dev.colla.io' | sudo tee --append /etc/hosts
# add local self-signed certificate to trusted, see infra/dev/proxy/certs/generate.sh
docker-compose -f infra/dev/docker-compose.yml up -d
open 'https://dev.colla.io'
```

