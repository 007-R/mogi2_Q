#アプリケーション名
Rese
![image](https://github.com/007-R/mogi2_Q/assets/66697562/5cffcdf2-0378-47c7-b051-dda4f01f712c)

#目的
飲食店予約サービスの提供

#アプリケーションURL
http://127.0.0.1

#機能一覧
会員登録
/ログイン
/ログアウト
/ユーザー情報取得
/ユーザー飲食店お気に入り一覧取得
/ユーザー飲食店予約情報取得
/飲食店一覧取得
/飲食店詳細取得
/飲食店お気に入り追加
/飲食店お気に入り削除
/飲食店予約情報追加
/飲食店予約情報削除
/エリアで検索する
/ジャンルで検索する
/店名で検索する
/予約変更機能
/評価機能
/バリデーション
/レスポンシブデザイン
/管理画面
/ストレージ
/認証
/メール送信
/リマインダー
/QRコード
/決済機能

#使用技術
laravel8.83.27

#テーブル設計

![image](https://github.com/007-R/mogi2_Q/assets/66697562/86faf98d-1cf2-4ef2-9dff-c752cb078d82)

![image](https://github.com/007-R/mogi2_Q/assets/66697562/7b1cea60-af03-4f12-a3b4-1c3738500afc)

![image](https://github.com/007-R/mogi2_Q/assets/66697562/aea35c58-dd58-4d46-9b80-33daf6c9d97e)

![image](https://github.com/007-R/mogi2_Q/assets/66697562/c1c2d9f8-497f-475a-a70e-ef3f6020c352)




#ER図

![image](https://github.com/007-R/mogi2_Q/assets/66697562/6e3a0732-3fc3-4978-8b64-012fd3c33337)



#環境構築

1 docker環境構築（docker-compose up -d --build）

２　 vendorファイルインストール(composer update(phpコンテナ内） * エラー発生時は「--ignore-platform-req=ext-gd」追加して実行)

3 .envファイル作成（touch .envにてファイル作成後、以下URLファイルの内容を転記）
https://drive.google.com/file/d/1RncpIPPmkoqEblJrLFfkPPZTuO1FQTig/view?usp=sharing

4 migration(docker-compose php artisan migrate(phpコンテナ内）) 

5 seeding(docker-compose php artisan db:seed(phpコンテナ内）)

6 storageリンク作成 (php artisan storage:link(phpコンテナ内）)

7 src/storage/app/publicに、以下URLのファイルを保管

https://drive.google.com/drive/folders/1av-ZAqjSW74QRa8ljmWG38C6rS4udip1



#その他(サンプルID(パスワード))

ユーザー：shaftsbury_works@yahoo.co.jp(password)

店鋪代表者：master1(password)　*/master/loginからログイン

サイト管理者：admin(password)　*/admin/loginからログイン
