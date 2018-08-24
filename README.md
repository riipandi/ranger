# Domato

Domato is acronym for Domain Management Tool. A simple DNS manager tool for PowerDNS.

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
git clone https://github.com/riipandi/domato.git domato
yarn install && yarn dev && composer install
php artisan migrate:fresh
php artisan migrate --seed
```

Do waht you want to do with this code.

### 4 - Send pull request

## Changelog

Please see [`CHANGELOG.md`](./CHANGELOG.md).
