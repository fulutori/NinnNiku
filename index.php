<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
	header("Location: signin.php");
}
$id = $_SESSION['user'];
$user_id = $id;
include_once 'dbconnect.php';
$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$sql = "SELECT point,achv FROM users WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$achv = $result['achv'];
$point = $result['point'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>トップページ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<link rel="shortcut icon" href="assets/favicon.ico" />
<link rel="icon" type="image/vnd.microsoft.icon" href="assets/favicon.ico">
<style type="text/css">
#name{min-height:30vh;padding-top:20vh;}	
@media (max-width: 991.98px) { 
	#character{position: absolute;}
	#character .img{ width:100% ;object-fit: contain;}
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
<div class="row">
<div id="character" class="col-12 col-lg-6 text-center">
<?php
	if ($point >= 50) {
		echo '<img src="assets/neko2.png" class="h-100 m-auto"/>';
	} else {
		echo '<img src="assets/neko1.png" class="h-100 m-auto"/>';
	}
?>
</div>
<div class="col-12 col-lg-6">
	<div id="name" class="container my-1">
		<div class="p-3 m-0 bg_gray_t">
		<?php
		if ($user_id!="") echo "<div><h4 class=\"text-white\">ID:".$user_id."</h4></div>";
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
	<a class="btn btn-outline-secondary w-100" href="mypage.php">マイページ</a>
	<a class="btn btn-outline-secondary w-100" href="signout.php?logout">ログアウト</a>
</div>
</div>
</div>
</body>
</html>