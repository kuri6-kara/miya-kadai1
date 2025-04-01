## アプリケーション名
```
お問合せフォーム
```

## 環境構築
```
Dockerビルド
　
　1.リポジトリからダウンロード
　$git clone git@github.com:kuri6-kara/miya-kadai1.git
　2.srcディレクトリにある「.env.example」をコピーして 「.env」を作成し DBの設定を変更
　$cp .env.example .env
　　　DB_HOST=mysql
　　　DB_DATABASE=laravel_db
　　　DB_USERNAME=laravel_user
　　　DB_PASSWORD=laravel_pass
　3.dockerコンテナを構築
　docker-compose up -d --build

Laravel環境構築
　
　1.docker-compose exec php bash
　2.composer install
　3..env.exampleファイルから.envを作成し、環境変数を変更
　4.
　5.
　6.
```

##　使用技術
```
　・PHP 8.4.1
　・Laravel 8.83.8
　・mysql 8.0.26
```

## ER図
![ER図](ER.drawio.png)

## URL
```
　・開発環境：http://localhost/
　・phpMyAdmin：http://localhost:8080/
```