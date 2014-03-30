
<?php

	require("./profile.php");
	require("./getlinkdata.php");
	require("./getlinkurl.php");

?>


<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>柿リンク</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>柿リンクｖ<?php echo $version; ?>+まねくずは</H2>
<HR>
<FORM METHOD=POST ACTION="makelinkdata.php">
タイトル：<INPUT TYPE=text NAME=TITLE SIZE=54><BR>
URL　　：<INPUT TYPE=text NAME=URL SIZE=54>　<INPUT name=REF type=checkbox value=checked>:リファラー消去<BR>
コメント<BR>
<TEXTAREA ROWS=5 COLS=100 NAME=MESSAGE wrap=hard></TEXTAREA><BR>
<P><INPUT TYPE=submit VALUE="送信 / 再読み込み">
</FORM>
<HR>
|<A href="./viewlog.php">ログ読み</A>|
<?php // |<A href="./i.php">アイモド</A>|| ?>
|<A href="./../link/link.php">柿リンクver.1</A>|
|<A href="./../rubytest/klinkr.cgi">柿リンクR (Ruby)</A>|<BR>
<?php @getlinkurl(); ?>
|<A href="./quicklink.php">クイックリンク設定</A>|
<HR>

<?php
	@getlinkdata(0,30, $db_server);
?>

<HR>
更新履歴<BR>
v2.6<BR>
☆削除機能を追加しました。<BR>
<BR>
v2.5<BR>
クイックリンク設定の変更が行えるようにしました。<BR>
<BR>
ver2.4<BR> 投稿記事番号の A name="1021"が数字の無いバグの解決。HTMLソースの改行。<BR>
文字エンコードタイプの変換を暫定的にやめました。utf8という存在も強くなってきているので。<BR>
</body>
</html>

