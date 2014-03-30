<?php

	require("./profile.php");

function getlinkurl(){

	require("./profile.php");
	
//	$db_id = @mysql_connect($db_server, "kaki", "kaki1221") or exit("Error:$db_serverへの接続に失敗しました<BR> $db_server");
//	mysql_select_db("kaki") or exit("データベースが選択できません");
//	$result = mysql_query("SELECT * FROM linkurl01 ORDER BY 'id'");

	$fname = "quicklink.csv";
	$file = @fopen($fname, 'r');

	while(!feof($file)){
		$data = @fgetcsv($file, 256);
		
		$url_title   = $data[0];
		$url_address = $data[1];
		
		$url = "<A href=\"$url_address\">$url_title</A>";
		
		echo "|";
		echo $url;
		echo "|\n";
	}
	

	fclose($file);
	

}

?>
