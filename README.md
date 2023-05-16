## Overview
Docker + Laravel10 + Mysql + phpMyAdminの開発テンプレート

## Requirement
- macOS
- Docker 20.10.17

## Usage
ローカルのDocker環境で利用する場合は、git clone後に該当ディレクトリに移動。

### コンテナを起動
`docker-compose up -d`
または
`docker compose up -d`

### コンテナに入る
`docker-compose exec app bash`
または
`docker compose exec app bash`

### コンテナ内でコマンド実行
1. `chmod -R 777 storage bootstrap/cache`
1. `composer install`
1. `cp .env.example .env`
1. `php artisan key:generate`
1. `php artisan storage:link`
1. `php artisan migrate`
1. `php artisan db:seed`

### アクセス
ブラウザでアクセス
[http://localhost](http://localhost)

### リポジトリの変更
git remote set-url origin https://github.com/[user-name]/[repository-name].git

## カスタマイズ内容
- 2038年問題対策としてtimestamp型のカラムを全てdatetime型に変更済

## Licence
未定