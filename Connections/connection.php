<?php
// �إ� MySQL ��Ʈw���s�u
$connection = mysqli_connect('localhost', 'username', 'password') or 
	trigger_error(mysqli_error(), E_USER_ERROR);
// �]�w�b�Τ�ݨϥ�UTF-8���r����
mysqli_set_charset( $connection, 'utf8');
?>