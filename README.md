# SkillVista

## 使い方

### 初期インストール（プロジェクトルートで）

```bash
$ make install
```

プロジェクト：http://localhost
phpMyAdmin：http://localhost:18080

## コンテナ情報

### app container

- Base image
  - [php](https://hub.docker.com/_/php):8.3-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.6

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.25

### db container

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### phpmyadmin container

- Base image
  - [phpmyadmin/phpmyadmin](https://hub.docker.com/_/phpmyadmin):最新版

### mailpit container

- Base image
  - [axllent/mailpit](https://hub.docker.com/r/axllent/mailpit)
