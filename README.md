## たけちょう商店 Webサイト

たけちょう商店のコーポレート・ECサイトです。  
企業の活動情報の閲覧や販売している商品の購入が可能です。  
![takecho-ec_top_image](https://github.com/Arrrrrchi/takecho_ec_docker/assets/89783339/4830317f-2ff5-493c-88e2-f9def6eb9c46)

ノーコードで作成した現在運用中のサイトをリメイクしました。  
＜運用中のサイト＞  
https://www.takecho.net/  


## URL
ユーザー向け（企業情報の閲覧、商品の購入、お問い合わせ機能）  
https://35.73.91.118/  
  
管理者向け（商品の登録、画像の登録機能）  
https://35.73.91.118/admin/login/  
  
## ポートフォリオの見どころ

### インフラ
* CircleCIでCI/CDパイプラインを構築している
* AWSを使用し、ALBを通して常時SSL通信を行っている

### バックエンド
* Laravelのサービスコンテナを使い、ファットコントローラ対策をしている

### フロントエンド
* CSSフレームワークのTailwindを使用し、レスポンシブデザインに対応している

## サービス構成図
![スクリーンショット 2023-07-21 11 23 55](https://github.com/Arrrrrchi/takecho_ec_docker/assets/89783339/8d04e44f-91d4-4247-bc2f-3cae0159097b)

## 機能一覧

### 管理者側
* 管理者登録、ログイン機能(breeze)
* 商品管理機能
    * 画像登録（複数アップ、自動リサイズ）
    * 商品登録
    * 在庫管理

### ユーザー側
* ユーザー登録、ログイン機能(breeze)
* 商品購入機能
    * カート
    * Stripe決済
    * 自動メール送信(Mailpit)
    * 在庫管理
* お問い合わせ(Mailpit)


## 使用技術
* PHP 8.1
* Laravel 10.0
* Vue.js 3.3.2
* MySQL
* Nginx
* AWS
    * VPC
    * EC2
    * RDS
    * CodeDeploy
    * Route53
    * ALB
    * ACM
* Docker/Docker-compose
* CircleCi CI/CD
* Stripe API
* YouTube(Google) API
* Instagram(Facebook) API