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
			
			//ポイント数確認
			$sql5 = "SELECT point FROM users WHERE id=?";
			$stmt5 = $pdo->prepare($sql5);
			$stmt5->execute([$user_id]);
			$result5 = $stmt5->fetchColumn();
			
			echo "<p><i class=\"fas fa-check text-success\"></i>チェックイン成功！ ";
			if ($result3 == 1) {
				$add_point = 10;
				echo "+".$add_point."point（Total: ".$result5."point）</p><div class=\"card p-2\">";
				echo $shop_name."<span class=\"badge badge-info badge-pill mx-1\">未</span></div>";
			} else {
				$add_point = 5;
				echo "+".$add_point."point（Total: ".$result5."point）</p><div class=\"card p-2\">";
				echo $shop_name;	
			}
			echo "</div>";

			//ポイント付与操作
			$sql4 = "UPDATE users SET point=point+? WHERE id=?";
			$stmt4 = $pdo->prepare($sql4);
			$stmt4->execute([$add_point,$user_id]);


			//称号付与操作(ポイント数)
			$achv_id = -1;
			if ($result5 == 30) {
				$achv_id = 3;
			} else if ($result5 == 20) {
				$achv_id = 2;
			} else if ($result5 == 10) {
				$achv_id = 1;
			}

			if ($achv_id != -1) {
				$sql6 = "INSERT INTO ach_log(id,achv_id) VALUES(?, ?)";
				$stmt6 = $pdo->prepare($sql6);
				$stmt6->execute([$user_id,$achv_id]);
			}

			//称号付与操作(店舗数)
			$sql7 = "SELECT COUNT(DISTINCT ramen_num) FROM log WHERE id=?";
			$stmt7 = $pdo->prepare($sql7);
			$stmt7->execute([$user_id]);
			$result7 = $stmt7->fetchColumn();

			$achv_id2 = -1;
			if ($result7 == 10) {
				$achv_id == 6;
			} else if ($result7 == 5) {
				$achv_id == 5;
			} else if ($result7 == 2) {
				$achv_id == 4;
			}

			if ($achv_id2 != -1) {
				$sql8 = "INSERT INTO ach_log(id,achv_id) VALUES(?, ?)";
				$stmt8 = $pdo->prepare($sql8);
				$stmt8->execute([$user_id,$achv_id2]);
			}
		}
	}
}
?>