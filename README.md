# Ranger

Ranger is a simple DNS manager tool for PowerDNS.

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
yarn install && yarn dev && composer install
php artisan migrate:fresh --seed
```

Do what you want to do with this code.

### 4 - Send pull request

## Changelog

Please see [`CHANGELOG.md`](./CHANGELOG.md).
