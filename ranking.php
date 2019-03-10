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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body style="padding-top:4.5rem;">
<?php include("header.php"); ?>

<div class="container">
<h2 class="m-1">ランキング</h2>
<hr>
<?php
$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$sql = 'SELECT id,point,achv FROM users ORDER BY point DESC';
$stmt = $pdo->query($sql);
$rank=1;
foreach ($stmt as $row) {
	$id = $row['id'];
	$point = $row['point'];
	$achievement = $row['achv'];
	if ($rank <= 100) {
		if ($id == $user_id) {
			echo "<div class=\"card container p-3 m-1 bg-maincolor text-white\"><class class=\"row\">
			<div class=\"col-4 text-center\">".$rank."位</div>
			<div class=\"col-4 text-center\">".$id."</div>
			<div class=\"col-4 text-center\">".$point."points</div>
			</div>";
		} else {
			echo "<div class=\"card container p-3 m-1\"><class class=\"row\">
			<div class=\"col-4 text-center\">".$rank."位</div>
			<div class=\"col-4 text-center\">".$id."</div>
			<div class=\"col-4 text-center\">".$point."points</div>
			</div>";
		}
	} else {
		if ($id == $user_id) {
			echo "<div class=\"card container p-3 m-1\"><class class=\"row\">
			<div class=\"col-4 text-center\">".$rank."位</div>
			<div class=\"col-4 text-center\">".$id."</div>
			<div class=\"col-4 text-center\">".$point."points</div>
			</div>";
		}
	}
	$rank++;
}
?>
<a href="./">トップページへ戻る</a>
</div>
</body>
</html>