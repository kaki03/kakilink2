
<?php

	require("./profile.php");
	require("./getlinkdata.php");
	require("./getlinkurl.php");

?>


<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>�����</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>����󥯣�<?php echo $version; ?>+�ޤͤ�����</H2>
<HR>
<FORM METHOD=POST ACTION="makelinkdata.php">
�����ȥ롧<INPUT TYPE=text NAME=TITLE SIZE=54><BR>
URL������<INPUT TYPE=text NAME=URL SIZE=54>��<INPUT name=REF type=checkbox value=checked>:��ե��顼�õ�<BR>
������<BR>
<TEXTAREA ROWS=5 COLS=100 NAME=MESSAGE wrap=hard></TEXTAREA><BR>
<P><INPUT TYPE=submit VALUE="���� / ���ɤ߹���">
</FORM>
<HR>
|<A href="./viewlog.php">���ɤ�</A>|
<?php // |<A href="./i.php">�������</A>|| ?>
|<A href="./../link/link.php">�����ver.1</A>|
|<A href="./../rubytest/klinkr.cgi">�����R (Ruby)</A>|<BR>
<?php @getlinkurl(); ?>
|<A href="./quicklink.php">�����å��������</A>|
<HR>

<?php
	@getlinkdata(0,30, $db_server);
?>

<HR>
��������<BR>
v2.6<BR>
�������ǽ���ɲä��ޤ�����<BR>
<BR>
v2.5<BR>
�����å����������ѹ����Ԥ���褦�ˤ��ޤ�����<BR>
<BR>
ver2.4<BR> ��Ƶ����ֹ�� A name="1021"��������̵���Х��β�衣HTML�������β��ԡ�<BR>
ʸ�����󥳡��ɥ����פ��Ѵ������Ū�ˤ��ޤ�����utf8�Ȥ���¸�ߤ⶯���ʤäƤ��Ƥ���Τǡ�<BR>
</body>
</html>

