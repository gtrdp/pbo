<?php
define(HOME, "http://localhost/pbo");				//HOME adalah basis dari url
include("scripts/lib.php");							//lib.php isinya class yang sudah dibuat

$handler = new requestHandler($_POST["request"]);	//membuat objek baru

$sini = $handler->action();							//memanggil method action, buat mengeksekusi sesuai request

//ini jika ada request khusus
if ($sini == "add") {								//add data
	$handler = new repo($_POST["value"]);
	$handler->storeData();
}elseif($sini == "show") {							//show data
	$handler = new repo($_POST["request"]);
	$handler->showData();
}elseif($sini == "del") {							//delete file
	$handler = new repo($_POST["request"]);
	$handler->delData();
}
?>