<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>�����å���󥯡��Խ�����</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H3>�����å���󥯡��Խ�����</H3>
�����å���󥯤ϡ�CSV�ե������Ȥä���󥯥ǡ����Ǥ���<BR>
CSV�ˤ��ǡ���������Ԥ��ޤ���<BR>

<A href="./link.php">���</A>
<HR>

<?php
	require("./profile.php");
	$fname = "quicklink.csv";
	
	$action = $_POST["action"];

	//�񤭹��ߥ⡼�ɡ�	
	if($action == "change"){
		// �ǡ����ι�����
		
		// quicklink CSV�ե�����Υ����ץ� �񤭹��߲�ǽ�⡼��
		$file = @fopen($fname, 'r+') or exit("�ե����뤬�����ץ�Ǥ��ޤ���Ǥ�����");
		@flock($fname, LOCK_EX);
		
		for( $i=1; $i<=10; $i++){
			$url_title[$i] = $_POST["url_title$i"];
			$url_address[$i] = $_POST["url_address$i"];
			
			$x = $url_title[$i] . "," . $url_address[$i] . "\r\n";
			@fwrite($file, $x);
		}
		
		@flock($fname, LOCK_UN);
		@fclose($file);
		echo "�ǡ������ѹ����ޤ�����";
	}

	// quicklink CSV�ե�����Υ����ץ�
	$file = @fopen($fname, 'r');

	// �ե����뤬����ɤˤʤ�ޤǡ�@fgetcsv��Ȥäƺ���256�Լ�����
	$i = 1;
	while(!feof($file)){
		$data = @fgetcsv($file, 256);
	
		$url_title[$i]   = $data[0];
		$url_address[$i] = $data[1];
		$i++;
		
	}
	
	@fclose($file);
?>

<FORM METHOD="POST" ACTION="quicklink.php">
<table>
<tr>
<th><th>�����ȥ�<th>���ɥ쥹<tr>

<?php 
	for( $i=1; $i<=10; $i++){
		echo '<td>' . $i . '<td><input type="text" name="url_title' . $i . '" size="50" value="' . $url_title[$i] . '"> <td> <input type="text" name="url_address' . $i . '" size="50" value="' . $url_address[$i] . '"><tr>' . "\r";
	}
?>

</table>

<HR>
<INPUT TYPE="submit" name="action" VALUE="change">

</form>

<?php

?>

</BODY>
</HTML>
