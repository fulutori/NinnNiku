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
$sql = "SELECT * FROM shop ORDER BY abs(latitude - ".$ido.") + abs(longitude - ".$keido.") limit 3";
$stmt = $pdo->query($sql);
if ($stmt == "") {
	echo "近くにラーメン屋はありません。";
} else {
	$rank=1;
	foreach ($stmt as $row) {
		$shop_name = $row['shop_name'];
		echo "<div class=\"card container p-3\"><class class=\"row\">
		<div class=\"col-4\">".$shop_name."</div>
		</div>";
		$rank++;
	}
}
?>