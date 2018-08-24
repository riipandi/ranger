# Ranger

Ranger is a simple DNS manager tool for PowerDNS.

## Install PowerDNS

```bash
apt install pdns-backend-pgsql
```

## Prepare Database

```bash
sudo -u postgres psql -c "DROP DATABASE IF EXISTS rangerdb"
sudo -u postgres psql -c "DROP ROLE IF EXISTS rangerdb"
sudo -u postgres psql -c "CREATE ROLE rangerdb WITH LOGIN PASSWORD 'xxxxxxxxxx'"
sudo -u postgres psql -c "CREATE DATABASE rangerdb OWNER rangerdb"
sudo -u postgres psql -c "ALTER ROLE rangerdb SUPERUSER"
sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE rangerdb TO rangerdb"
```

## Contributing

### 1 - Prepare your environment

```bash
git config --global user.email "Your nice name"
git config --global user.name  "Your email address"
```

Optional:

```bash
composer global require friendsofphp/php-cs-fixer
npm install -g git-upload
```

### 2 - Start contributing

Clone repo:

```bash
git clone https://github.com/riipandi/ranger.git ranger
yarn install && yarn dev && composer install --profile
php artisan app:init --force
php artisan migrate:fresh --seed
```

Do what you want to do with this code.

### 4 - Send pull request

## Changelog

Please see [`CHANGELOG.md`](./CHANGELOG.md).
