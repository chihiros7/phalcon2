# 概要
何かしらの事情で公式サポートが終了したphalconのversion2とapacheを使わないといけない人向けのdockerです。  
gitのタグから掘り起こしてます。

こいつのディレクトリに移動して以下コマンド叩けば動く状態にしてあります。  
docker-compose up -d

wwwがdocker内部のapacheのDOCUMENT_ROOTとマウントしてあるのでその上にリソースおけば
localhostで確認できます。  
(ローカルの80番ポートでdockerの80番ポートに繋がるようになってるんので、
ポート塞がってたらymlの部分変えてください)

phalcon devtoolsがはいっているから、
phalcon-webのコンテナに入ってdockerコマンドでプロジェクト作れます。

phpInfoおいてあります。  
http://localhost/

以下のコマンドで作ったすっぴん日プロジェクトおいてあります。  
phalcon project sample  
http://localhost/sample/  


DBはまだwebコンテナから疎通確認してないけど、
linksでつなげてるから理論上繋がるはず。

詳細は気が向いたら追記します。

簡単なCRUPDサンプルを作ってあげる予定。

# 環境
## phalcon-web
OS Debian GNU/Linux 9  
PHP 5.6.40  
phalcon 2.0.13  
Apache 2.4.25  

## phalcon-db
mysql:5.6 

v