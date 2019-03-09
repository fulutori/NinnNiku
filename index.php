<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
	header("Location: signin.php");
}
$id = $_SESSION['user'];

$user_id = $id;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>マイページ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<style type="text/css">
@media (min-width: 992px) { 
	#name{height:40vh;}	
 }
#top_menu_buttons{
    height:50vh;
}
#buttons_sub{
    float: left;
    margin: 0;
}
#buttons_main{
    float: left;
    margin: 0;
}
#to_ninnniku_btn{background-color: #720C08;}
#to_ranking_btn{background-color: #39BF3E;}
#to_find_btn{background-color: #C41713;}
</style>
</head>
<body style="padding-top:4.5rem;">

<?php include("header.php"); ?>

<div class="container">
<h2 class="m-1">トップページ</h2>
<div class="row">
<div id="character" class="col-6">
	<br><br><br><br><br><br><br><br><br>
</div>
<div class="col-12 col-lg-6">
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
	<div id="top_menu_buttons" class="w-100">
		<div id="buttons_sub" class="h-100 w-50">
			<div class="p-1 h-50"><a href="ninnniku.php">
				<div id="to_ninnniku_btn" class="h-100 m-0 p-1 text-light rounded">今いるラーメン店にチェックイン</div>
			</a></div>
			<div class="p-1 h-50"><a href="ranking.php">
				<div id="to_ranking_btn" class="h-100 m-0 p-1 text-light rounded">ランキング</div>
			</a></div>
		</div>
		<div id="buttons_main"class=" h-100 w-50">
			<div class="p-1 h-100"><a href="find.php">
				<div id="to_find_btn" class="h-100 m-0 p-1 text-light rounded">ラーメン店を探す</div>					
			</a></div>
		</div>
</div>
</div>
<div id="setting" class="col-12 btn-group d-flex my-5" role="group">
	<a class="btn btn-outline-secondary w-100" href="change.php">パスワードを変更</a>
	<a class="btn btn-outline-secondary w-100" href="signout.php?logout">ログアウト</a>
</div>
</div>
</div>
</body>
</html>