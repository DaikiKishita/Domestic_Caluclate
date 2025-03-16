DCシステム機動順序

# 1

## 必要なファイルの作成
```bash
mkdir ./docker/nginx/logs
mkdir ./docker/mysql
```

# 2
## コンテナ作成
```bash
docker compose up -d
```

# 3 
## appコンテナに入る
```bash
docker exec -it app bash
```

# 4
## mysqlへ接続するための設定
```bash
DB_CONNECTION=mysql
DB_HOST=l11dev-mysql
DB_PORT=3306
DB_DATABASE=dc
DB_USERNAME=root
DB_PASSWORD=root
```

```bash
php artisan migrate
```

# 番外編 
## laravelプロジェクトの作成

まずサブフォルダを作ってそこにLaravelをインストール。ここではバージョン11を指定しています。
```bash
mkdir l11dev_tmp
cd l11dev_tmp
composer create-project "laravel/laravel=11.*" . --prefer-dist
```

次に中身をプロジェクトフォルダに移動し、一時サブフォルダを削除。
```bash
cd /src
mv l11dev_tmp/* ./
mv l11dev_tmp/.* ./
rm l11dev_tmp -rf
```

## 依存のインストール
```bash
composer install
npm install
```

## 権限
```bash
chmod -R guo+w storage
php artisan storage:link
```

