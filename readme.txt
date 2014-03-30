＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
＊　　　　　　　　　　　　　　　　　　　　＊
＊　　柿リンク2×まねくずは　　　　　　　 ＊
＊　　　　　　　　　　　　　　　　　　　　＊
＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

掲示板風にリンクを投稿するPHPスクリプトです。
くずはスクリプトを思いっきり参考にしています。

柿リンク２の方は、MySQLを使ってデータを管理しています。
データベースは「EUC-JP」で管理されていると定義します。各々のファイルもEUC-JPで保存しています。


link.php     -- メイン。投稿と記事一覧表示。
makelinkdata.php -- 投稿されたリンクデータを整形し、MySQLでデータベースに格納します。
getlinkdata.php  -- データベースからレコードを取って、投稿記事として整形します。
deletelinkdata.php -- 選択された記事を削除します。
viewlog.php     -- ログ読み。link.phpの投稿画面なし版と言えます。0～1000件までを一気に表示します。

profile.php    -- 必要な変数。ヘッダファイルに相当する。

quicklink.php     -- クイックリンク設定。CSVファイルを使ったリンク画面。
getlinkurl.php    -- クイックリンクのgetlink。CSVファイルから取る。
quicklink.csv    -- クイックリンクがCSVファイルで入っている。「タイトル, URL」のみ。

i.php
makelinkdata_i.php
viewlog_i.php


＊＊＊＊＊＊＊＊
＊　基本情報　＊
＊＊＊＊＊＊＊＊

・画面遷移

link.php →(投稿)→ makelinkdata.php
　　　　 →(ログ読み)→ viewlog.php
         →(クイックリンク設定)→ quicklink.php

＊＊＊＊＊＊＊＊＊＊＊
＊　ファイルの詳細　＊
＊＊＊＊＊＊＊＊＊＊＊
・link.php
メイン画面。
これ自体は、@getlinkdata(0,30,$db_server)を呼び出しているだけです。30件表示させています。
投稿したらmakelinkdata.phpへと飛びます。

・getlinkdata.php
データベースからレコードを取って、投稿記事として整形します。

データベースのフィールドには、
title            タイトル
url                URLアドレス
message        本文
up_date        投稿月日
up_time        投稿時刻
date_time    整形された投稿日時
flag             リファラーを入れるかのフラグ
hidden		投稿記事を表示させない
が入っています。


@getlinkdata( 最初の記事番号，最後の記事番号，データベースサーバー, エンコードタイプ)

エンコードタイプのデフォルトはEUC-JPです。


＊＊＊＊＊＊＊＊＊＊＊
＊　インストール　　＊
＊＊＊＊＊＊＊＊＊＊＊

インストールの方法です。

profile.phpにデータベースの場所、ユーザー、パスワード、DB名、テーブル名を記述してください。

当該DBに次のようなテーブルを作成してください。
フィールド名|	種別	|	NULL値|	その他
id		int(11)			auto_increment
title		varchar(255)
url		varchar(255)	NULL可
message		text		NULL可
up_date		date
up_time		time
date_time	varchar(255)
flag		int(11)
hidden		int(11)
	

＊＊＊＊＊＊＊＊
＊　更新履歴　＊
＊＊＊＊＊＊＊＊
v2.6
☆削除機能の追加
deletelinkdata.phpを追加し、記事の削除が行えるようにしました。
実際にはhiddenを1にし、hidden=1の場合はデータを出さないようにgetlinkdata.phpを書き換えました。
v2.5
クイックリンク設定の追加
クイックリンク設定の変更が行えるようにしました。
それに伴い、ファイル名を
旧：chlinkurl.php → 新：quicklink.php
へ変更しました。CSVデータに編集できるようにしました。
書き込みモードと読み込みモードが重複して無駄になってるような気がするからそこは直した方がいいかも。
v2.4
投稿記事を番号として識別する<A name="1021"></A>の数字が出ていなかった問題を解決しました。
HTMLソースが改行されていない為に見づらいのを解決しました。
utf-8のデータベースサーバを使う為に、getlinkdata, makelinkdataに
　//	@mysql_query("SET NAMES utf8")
というコマンドを追加しました。utf8の場合にはこれを有効にしてください。
文字エンコードタイプの変換を暫定的にやめました。utf8という存在も強くなってきているので。





＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
＊　プログラムに関する事項　＊
＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

・SJISについて。
getlinkdata.phpを除いて、
link.php ⇔ i.php
viewlog.php ⇔ viewlog_i.php
makelinkdata.php ⇔ makelinkdata_i.php
とわざわざ別ファイルで用意しています。これはHTMLソースがくっついてるため、EUCとSJISで異なる保存をしないといけない、という問題が発生してるからです。HTMLもPHPで吐き出して、EUCとSJIS選択すれば統一できるかもです。
