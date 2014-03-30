#!/usr/local/bin/perl

#==================================================================
#
# Copyright (C) 2002 Imu http://ra-map.hp.infoseek.co.jp/
# 
#==================================================================

# TOPページ
$TOP = "";

# リフレッシュを使う
$RFRESH = "1";

# リフレッシュ時間（秒）
$TIME = "1";
# リフレッシュ時間（外から入ってきたとき）
$E_TIME = "1";

# 画像
$COUNT ="count01.gif";
# 背景、テキストの色等
$body =	"<BODY TEXT=#000000 LINK=FF0000 VINK= >";

###### 設定終 #######

$QUERY_DATA = $ENV{'QUERY_STRING'};


	print "Content-type: text/html\n\n"; 

if ($QUERY_DATA ne '') {
	print "<HTML lang=\"ja\"><HEAD>";
	print "<META HTTP-EQUIV=\"Content-type\" CONTENT=\"text/html; charset=Shift_JIS\">\n";
	print "$body\n";
	if ($RFRESH eq '1') { print "<META HTTP-EQUIV=\"refresh\" CONTENT=\"$TIME;url=$QUERY_DATA\">"; }
	print "<a href=\"$QUERY_DATA\">$QUERY_DATA</a><br>";
	if ($RFRESH eq '1') { print "へ転送中($TIME\sec)<br><img src=$COUNT>"; }
	else { print "上記サイトにジャンプします。リンクをクリックしてください"; }
	print "</HEAD></HTML>";
	exit;
}else{
# 外からdirect.cgiに入ってきた場合の処理
	print "<HTML><HEAD>";
	print "<META HTTP-EQUIV=\"refresh\" CONTENT=\"$E_TIME;url=$TOP\">";
	print "<a href=\"$TOP\">$TOP</a>";
	print "</HEAD></HTML>";
	exit;
}
