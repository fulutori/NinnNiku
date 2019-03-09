<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
	header("Location: signin.php");
}
$id = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>マイページ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
body {
	margin-right: auto;
	margin-left: auto;
	width: 90%;
	max-width: 600px;
}
</style>
</head>
<body>
<h2>トップページ</h2>
<div id="name">
	<?php
	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
	$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$sql = 'SELECT * FROM users WHERE id=?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);
	$pdo = null;
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$user = $result['id'];
	echo "<p>ID: ".$user."</p>\n";
	?>
</div>
<div>
	今いるラーメン店にチェックイン
</div>
<div>
	ラーメン店を探す
</div>
<div>
	
</div>
<div id="setting">
	<p><a href="change.php">パスワードを変更</a></p>
	<p><a href="signout.php?logout">ログアウト</a></p>
</div>
</body>
</html>