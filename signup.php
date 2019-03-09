<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>新規登録</title>
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
<h2>新規登録</h2>
<hr>
<div class="form-group">
<form method="post">
<input type="text" class="form-control" name="user" maxlength="30" placeholder="ID(30字まで)" required />
</div>
<div class="form-group">
<input type="password" class="form-control" name="pass" maxlength="256" placeholder="パスワード(半角英数字記号256文字まで)" required />
</div>
<div class="form-group">
<input type="password" class="form-control" name="re_pass" maxlength="256" placeholder="パスワード(再入力)" required />
</div>
<button type="submit" class="btn btn-default" name="signup">登録</button>
<br>
<br>
<a href="signin.php">ログインはこちら</a>
<?php
session_start();
if( isset($_SESSION['user']) != "") {
	header("Location: ./");
}
include_once 'dbconnect.php';
if(isset($_POST['signup'])) {
	$user = htmlspecialchars($_POST['user']);
	$pass = htmlspecialchars($_POST['pass']);
	$re_pass = htmlspecialchars($_POST['re_pass']);
	if (strcmp($pass, $re_pass) != 0) {
		?><br><br><div class="alert alert-danger" role="alert">パスワードが一致しません。</div><?php
			exit();
	}
	$pass = password_hash($pass, PASSWORD_DEFAULT);
	$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
	$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$sql = "SELECT COUNT(*) FROM users WHERE id=?";
	$stmt = $pdo->prepare($sql);
	if($stmt->execute([$user])) {
		$result = $stmt->fetchColumn();
		if ($result != 0) {
			?><br><br><div class="alert alert-danger" role="alert">このユーザー名は既に登録されています</div><?php
			exit();
		}
	}
	$sql = "INSERT INTO users(id,pass) VALUES(?, ?)";
	$stmt = $pdo->prepare($sql);
	if($stmt->execute([$user, $pass])) {
		?><br><br><div class="alert alert-success" role="alert">登録しました</div><?php
	} else {
		?><br><br><div class="alert alert-danger" role="alert">エラーが発生しました</div><?php
	}
	$pdo = null;
}
?>
<br>
<br>
</form>
</body>
</html>