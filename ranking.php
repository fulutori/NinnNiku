<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
	header("Location: login.php");
}
$user_id = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ランキング</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<style>
body {
	margin-right: auto;
	margin-left: auto;
	width: 90%;
	max-width: 600px;
}
table {
	border-collapse: collapse;
	width: 100%;
	max-width: 400px;
}
table th {
	padding: 10px;
	border: solid 1px black;
}
table td {
	padding: 3px 10px;
	border: solid 1px black;
	text-align: right;
}
</style>
</head>
<body>
<h2>ランキング</h2>
<hr>
<table>
<tr><th>RANK</th><th>ID</th><th>称号</th></tr>
<?php
$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$sql = 'SELECT id,point,achievement FROM users ORDER BY point DESC';
$stmt = $pdo->query($sql);
$rank=1;
foreach ($stmt as $row) {
	$id = $row['id'];
	$point = $row['point'];
	$achievement = $row['achievement'];
	if ($rank <= 100) {
		if ($id == $user_id) {
			echo "<tr style=\"background: #ffcccc\"><td>".$rank."</td><td>".$id."</td><td>".$point."</td>\n";
		} else {
			echo "<tr><td>".$rank."</td><td>".$id."</td><td>".$point."</td>\n";
		}
	} else {
		if ($id == $user_id) {
			echo "<tr><td colspan=\"3\"></td></tr>";
			echo "<tr style=\"background: #ffcccc\"><td>".$rank."</td><td>".$id."</td><td>".$point."</td>\n";
			echo "<tr><td colspan=\"3\"></td></tr>";
		}
	}
	$rank++;
}
?>
</table>
<br>
<br>
<a href="./">トップページへ戻る</a>
</body>
</html>