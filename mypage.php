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

<div class="col-12">
	<div class="container p-3 shadow-sm bg-light my-2">
	<div class="row">
		<div class="col-6">
			<?php if ($user_id!="") echo "<div><h4>ID:".$user_id."</h4></div>";
			include_once 'dbconnect.php';
			$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
			$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$sql = "SELECT point,achv FROM users WHERE id=?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$user_id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$achv = $result['achv'];
			$point = $result['point'];
			$sql = "SELECT * FROM ach_db WHERE achv_id=?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$achv]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$achv_name=$result['achv_name'];//称号の名前
			$achv_class=$result['rare'];//称号のクラス
			echo "<div class=\"rounded px-3 py-1 m-auto text-white achv achv_cls".$achv_class."\">".$achv_name."</div>"
			?>
		</div>
		<div class="col-6">
			<?php echo $point."point";?>
		</div>
	</div>
	</div>
</div>
<div class="card m-1 col-md-6">
	<h4 class="card-title">獲得した称号</h4>
	<div class="container"><div class="row">
			<?php
				$cnt=0;
				while(1){
				$sql = "SELECT * FROM ach_db WHERE achv_id=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute([$cnt]);
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				if($result['achv_name']==""){break;}
				$achv_name=$result['achv_name'];//称号の名前
				$achv_class=$result['rare'];//称号のクラス
				echo "<div class=\"col-12 col-lg-6 text-center\">";
				if(false){
					echo "<div class=\"rounded px-3 py-1 m-1 text-white achv achv_cls".$achv_class."\">".$achv_name;
				}else{
					echo "<div class=\"rounded px-3 py-1 m-1 text-white achv bg-dark \">".$achv_name;
				}
				echo "</div></div>";
				$cnt++;
				}
			?>
			</div></div>
	<!--phpで全表示を書く-->
</div>
<div class="card m-1 col-lg-6">
	<h4 class="card-title">履歴</h4>
	<!--phpで全表示を書く-->
</div>
<div class="card m-1 col-lg-6">
	<h4 class="card-title">キャラクタ</h4>
	<!--phpで全表示を書く-->
</div>
<div class="card m-1 col-lg-6">
	<h4 class="card-title">傾向</h4>
	<!--phpで全表示を書く-->
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