<?php

	header("content-type:text/html; charset=utf-8");

	$browser_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

	echo "瀏覽器語系資料：". $browser_lang;

	echo "<br />";

	if(strrpos(strtolower($browser_lang), 'zh-cn') !== false) {
		echo '簡體中文語系';
		exit;
	} else if (strrpos(strtolower($browser_lang), 'zh-tw') !== false){
		echo '繁體中文語系';
		exit;
	}
?>