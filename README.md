# SkillVista

## 環境

- Laravel ver 9.19
- tailwindcss ver 3.3.6

## 使い方

### 初期インストール（プロジェクトルートで）

```bash
$ make install
```

- プロジェクト：http://localhost/top
- phpMyAdmin：http://localhost:18080

### コンテナ起動（プロジェクトルートで）

```bash
$ make up
```

### npm install
```bash
$ make npm-install
```

### vite立ち上げ（srcディレクトリで）

```bash
$ cd src
$ npm run dev
```

### composer install
```bash
$ make composer-install
```

### マイグレーションの実行（プロジェクトルートで）

```bash
$ make migrate
```

### コンテナ停止（プロジェクトルートで）

```bash
$ make down
```

### コンテナ再起動（プロジェクトルートで）

```bash
$ make restart
```

### appコンテナシェルログイン（php）（プロジェクトルートで）

```bash
$ make app
```

### すべてのテーブルを削除後にマイグレーション・シーダの実行（プロジェクトルートで）

```bash
$ make fresh
```

### シーダの実行（プロジェクトルートで）

```bash
$ make seed
```

### Laravelキャッシュクリア（プロジェクトルートで）

```bash
$ make clear
```

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
