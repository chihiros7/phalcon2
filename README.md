<!-- TOC -->

- [1. 概要](#1-概要)
- [2. 環境](#2-環境)
    - [2.1. phalcon-web](#21-phalcon-web)
    - [2.2. phalcon-db](#22-phalcon-db)
    - [2.3. フォルダ構成](#23-フォルダ構成)
- [3. 実行手順](#3-実行手順)
- [4. 起動](#4-起動)
    - [4.1. ホスト側の事前準備](#41-ホスト側の事前準備)
    - [4.2. 起動手順](#42-起動手順)
- [5. 実行手順](#5-実行手順)
    - [5.1. phalcon-web](#51-phalcon-web)
    - [5.2. phalcon-db](#52-phalcon-db)
- [6. その他](#6-その他)

<!-- /TOC -->


# 1. 概要
何かしらの事情で公式サポートが終了したphalconのversion2とapacheを使わないといけない人向けのdockerです。  

<br><br>

# 2. 環境
## 2.1. phalcon-web
 Debian 
PHP 5.6.40  
phalcon 2.0.13  
Apache 2.4.25  

| 項目名 | バージョン | 備考 |
----|----|---- 
| OS | GNU/Linux 9 | dockerのimageであるphp:5.6-apacheに依存 |
| ユーザ | docker | |
| パスワード | docker | |

## 2.2. phalcon-db
mysql:5.6 

## 2.3. フォルダ構成
| パス | 説明 | 備考 |
----|----|---- 
| web/www| apacheのドキュメントルートと同期されている| ここに配置したものがlocalhostの80番ポートでリクエストした際に出力される。 | 
| web/conf/php.ini| php.iniファイル| 反映させるときはdockerを起動しなおします。 | |
| db/data | mysqlディレクトリと同期されている | git管理外にしてあります。DBデータの永続化が必要なければvolimesから外してください。 |

<br><br>
# 3. 実行手順

<br><br>
# 4. 起動
## 4.1. ホスト側の事前準備
docker・docker-composeを利用するため、事前にインストールしておいてください。

以下のコマンドでインストールを確認してください。
```
docker --version
```
```
docker-compose --version
```

## 4.2. 起動手順
ターミナルやコマンドプロンプトでクローンしたphalcon2のディレクトリに移動してください

以下のコマンドを実行します。webとdbの2つのコンテナが起動します。
```
docker-compose up -d
```
コンテナが起動しているかどうかを以下のコマンドで確認してください。
STATUSがUpになっていれば
```
docker ps
```

<br><br>

# 5. 実行手順
## 5.1. phalcon-web
apahceが起動していることを以下URLにリクエストして確認します。
phpinfoが表示されようになっているため、不足しているモジュール等があれば各自追加してください。
(phalconモジュールは追加済です)
http://localhost/


また、以下のコマンドで作ったすっぴんプロジェクトおいてあります。  
phalcon project sample  
http://localhost/sample/


## 5.2. phalcon-db
以下の情報で接続可能です。

| 項目名 | 設定値 |
----|---- 
| ホスト | 127.0.0.1 または localhost |
| ユーザ | docker |
| パスワード | docker |

# 6. その他
webtoolsを使おうとするとエラーになる。
理由はローカルホスト以外からはアクセスできないようになっているため。
checkAccess()にホストのIPを追加するか、開発環境と割り切って無条件でtrueを返すようにすれば繋がります。
```
/home/phalcon-devtools/scripts/Phalcon/Web/Tools/controllers/ControllerBase.php
```

ブラウザからコントローラーやモデルを作成することができます。
```
http://localhost/sample/webtools.php
```