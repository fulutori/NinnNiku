<?php
if (!isset($_POST['ido'])) {
	exit();
} else if (!isset($_POST['keido'])) {
	exit();
}
include_once 'dbconnect.php';
$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$ido = $_POST['ido'];
$keido = $_POST['keido'];
$user_id = $_POST['user_id'];
$sql = 'SELECT * FROM shop WHERE abs(latitude - ?) < 0.0003 AND abs(longitude - ?) < 0.0005 ORDER BY abs(latitude - ?) + abs(longitude - ?) limit 1';
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$ido, $keido, $ido, $keido])) {
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$shop_name = $result['shop_name'];
	if ($shop_name == "") {
		echo "ここはラーメン屋ではありません。";
	} else {
		echo $shop_name;	
	}
}
?>