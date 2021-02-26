<?php
// 建立 MySQL 資料庫的連線
$connection = mysqli_connect('localhost', 'username', 'password') or 
	trigger_error(mysqli_error(), E_USER_ERROR);
// 設定在用戶端使用UTF-8的字元集
mysqli_set_charset( $connection, 'utf8');
?>