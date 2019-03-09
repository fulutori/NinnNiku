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
$sql = 'SELECT * FROM shop WHERE abs(latitude - ?) < 0.00015 AND abs(longitude - ?) < 0.0002 ORDER BY abs(latitude - ?) + abs(longitude - ?) limit 1';
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$ido, $keido, $ido, $keido])) {
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$shop_name = $result['shop_name'];
	$ramen_num = $result['ramen_num'];
	if ($shop_name == "") {
		echo "ここはラーメン屋ではありません。";
	} else {
		$sql = "SELECT COUNT(*) FROM ".$user_id." WHERE ramen_num=".$ramen_num;
		$stmt = $pdo->query($sql);
		if($stmt) {
			$result = $stmt->fetchColumn();
			if ($result == 0) {
				$sql = "INSERT INTO ".$user_id." (ramen_num) VALUES(".$ramen_num.")";
				$stmt = $pdo->query($sql);
				if($stmt) {
					echo $shop_name."(初)";
				}
			} else {
				echo $shop_name;
			}
		}
	}
}
?>