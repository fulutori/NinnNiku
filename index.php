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
	#name{min-height:40vh;}	
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
#to_ranking_btn{background-color: #F7CF03;}
#to_find_btn{background-color: #C41713;}
</style>
</head>
<body style="padding-top:4.5rem ;" class="bg-maincolor2">

<?php include("header.php"); ?>

<div class="container ">
<h2 class="m-1">マイページ</h2>
<div class="row">
<div id="character" class="col-6">
	<br><br><br><br><br><br><br><br><br>
</div>
<div class="col-12 col-lg-6">
	<div id="name " class="container my-5">
		<div class="p-3 m-0 bg_gray_t">
		<?php if ($user_id!="") echo "<div><h4>ID:".$user_id."</h4></div>";
		include_once 'dbconnect.php';
		$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
		$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$sql = "SELECT achv FROM users WHERE id=?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$user_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$achv = $result['achv'];
		$sql = "SELECT * FROM ach_db WHERE achv_id=?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$achv]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$achv_name=$result['achv_name'];//称号の名前
		$achv_class=$result['rare'];//称号のクラス
		echo "<div class=\"rounded px-3 py-1 m-auto text-white achv achv_cls".$achv_class."\">".$achv_name."</div>"
		?>
		</div>
	</div>
	<div id="top_menu_buttons" class="w-100">
		<div id="buttons_sub" class="h-100 w-50">
			<div class="p-1 h-50"><a href="ninnniku.php">
				<div id="to_ninnniku_btn" class="menu_btn h-100 m-0 p-1 text-light rounded ">
					<span>チェックイン</span><img src="assets/icon_check.svg"/>
				</div>
			</a></div>
			<div class="p-1 h-50"><a href="ranking.php">
				<div id="to_ranking_btn" class="menu_btn h-100 m-0 p-1 text-light rounded">
					<span>ランキング</span><img src="assets/icon_crown.svg"/>
				</div>
			</a></div>
		</div>
		<div id="buttons_main"class=" h-100 w-50">
			<div class="p-1 h-100"><a href="find.php">
				<div id="to_find_btn" class="menu_btn h-100 m-0 p-1 text-light rounded hov_anim">
					<span>ラーメン店を探す</span><img src="assets/icon_ramen.svg"/>
				</div>					
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