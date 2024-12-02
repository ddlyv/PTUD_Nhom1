<?php
	session_start();
	session_destroy();
	header('location:../HaiPhong/index.php');
?>