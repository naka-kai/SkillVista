# 初期インストール（最初のみ）
# コンテナの構築・起動、composerのインストール、.envファイルのコピー、アプリケーションキーの生成、シンボリックリンクの作成、storageディレクトリの権限変更、migrationのfreshとseed
install:
	@make build
	@make up
	docker compose exec app composer install
	docker compose exec app cp .env.example .env
	docker compose exec app php artisan key:generate
	docker compose exec app php artisan storage:link
	docker compose exec app chmod -R 777 storage bootstrap/cache
	@make fresh
# composer インストール
composer-install:
	docker compose exec app composer install
# コンテナ立ち上げ
build:
	docker compose build
# キャッシュを含めずコンテナ立ち上げ
build-no:
	docker compose build --no-cache
# コンテナ起動
up:
	docker compose up -d
# コンテナ停止（削除しない）
stop:
	docker compose stop
# コンテナを停止し、 up で作成したコンテナ、ネットワーク、ボリューム、イメージを削除
down:
	docker compose down
# Composeファイルで定義していないサービス用のコンテナも削除
down-r:
	docker compose down --remove-orphans
# 上記に加えComposeファイルの `volumes` セクションの名前付きボリュームを削除。また、コンテナがアタッチした匿名ボリュームも削除
down-rv:
	docker compose down --remove-orphans --volumes
# 上記に加えあらゆるサービスで使う全イメージを削除
destroy:
	docker compose down --rmi all --volumes --remove-orphans
# コンテナの再起動
restart:
	@make down
	@make up
# 全てのイメージを削除して初期インストール
remake:
	@make destroy
	@make install
# コンテナ一覧を表示
ps:
	docker compose ps
# webコンテナシェルログイン（nginx）
web:
	docker compose exec web bash
# appコンテナシェルログイン（php）
app:
	docker compose exec app bash
# dbコンテナシェルログイン（mysql）
db:
	docker compose exec db bash
# mysqlにログイン
sql:
	docker compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
# マイグレーションの実行
migrate:
	docker compose exec app php artisan migrate
# すべてのテーブルを削除後にマイグレーション・シーダの実行
fresh:
	docker compose exec app php artisan migrate:fresh --seed
# シーダの実行
seed:
	docker compose exec app php artisan db:seed
# Laravelキャッシュクリア
clear:
	docker compose exec app composer clear-cache
	docker compose exec app php artisan optimize:clear
	docker compose exec app php artisan event:clear
	docker compose exec app php artisan cache:clear
	docker compose exec app php artisan config:clear
	docker compose exec app php artisan route:clear
	docker compose exec app php artisan view:clear
# npm install
npm-install:
	cd src && npm install && cd ../
