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

#latitude(緯度)は0.00027778で31メートルぐらい
#longitude(経度)は計算が難しいので緯度よりも多めに指定する
# WHERE abs(latitude - ".$ido.") < 0.015 AND abs(longitude - ".$keido.") < 0.03
$sql = "SELECT * FROM shop WHERE abs(latitude - ".$ido.") < 0.015 AND abs(longitude - ".$keido.") < 0.025 ORDER BY abs(latitude - ".$ido.") + abs(longitude - ".$keido.") limit 3";
$stmt = $pdo->query($sql);
if ($stmt) {
	$rank=1;
	foreach ($stmt as $row) {
		$ramen_num = $row['ramen_num'];
		$shop_name = $row['shop_name'];
		$sql = "SELECT COUNT(*) FROM log WHERE id=? AND ramen_num=?";
		$stmt2 = $pdo->prepare($sql);
		$stmt2->execute([$user_id, $ramen_num]);
		$result2 = $stmt2->fetchColumn();
		if ($result2 == 0) {
			echo "<div class=\"card container p-3 m-1\"><class class=\"row\">
			<div class=\"col-12\">".$shop_name."<span class=\"badge badge-info badge-pill mx-1\">未</span></div>
			</div>";
		} else {
			echo "<div class=\"card container p-3 m-1\"><class class=\"row\">
			<div class=\"col-12\">".$shop_name."</div>
			</div>";
		}
		$rank++;
	}
	if ($rank == 1) {
		echo "近くにラーメン店はありません。";
	}
}
?>