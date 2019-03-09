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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
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
<h2>マイページ</h2>
<hr>
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
<br>
<p><a href="change.php">パスワードを変更</a></p>
<p><a href="signout.php?logout">ログアウト</a></p>
<br>
<br>
</body>
</html>