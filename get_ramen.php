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
# WHERE abs(latitude - ?) < 0.0003 AND abs(longitude - ?) < 0.0005
$sql = 'SELECT * FROM shop ORDER BY abs(latitude - ?) + abs(longitude - ?) limit 1';
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$ido, $keido])) {
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$shop_name = $result['shop_name'];
	$ramen_num = $result['ramen_num'];
	if ($shop_name == "") {
		echo "ここはラーメン屋ではありません。";
	} else {
		$sql = "INSERT INTO log(id,ramen_num) VALUES(?, ?)";
		$stmt2 = $pdo->prepare($sql);
		if ($stmt2->execute([$user_id, $ramen_num])) {
			$sql = "SELECT COUNT(*) FROM log WHERE id=? AND ramen_num=?";
			$stmt3 = $pdo->prepare($sql);
			$stmt3->execute([$user_id, $ramen_num]);
			$result3 = $stmt3->fetchColumn();
			if ($result3 == 1) {
				echo $shop_name."<span class=\"badge badge-info badge-pill mx-1\">未</span>";
			} else {
				echo $shop_name;	
			}
		}
	}
}
?>