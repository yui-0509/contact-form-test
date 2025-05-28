お問い合わせフォーム

環境構築

Dockerビルド
1 git clone git@github.com:yui-0509/contact-form-test.git
2 docker-compose up -d -build

Laravel環境構築
1 docker-compose exec php bash
2 composer install
3 .envファイルから.envを作成し、環境変数を変更
4 php artisan key:generate
5 php artisan migrate
6 php artisan db:seed

使用技術
・php 7.3以上または8.0以上
・Laravel　8.75以上
・MySQL 8.0.26

ER図
laravel/contact-form-test/src/public/images/er_drawio.png

URL
・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/
