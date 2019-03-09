<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])) {
	$user_flag = 0;
} else {
	$user_flag = 1;
	$user_id = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ラーメン屋</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
<div style="display: flex; justify-content: space-between; align-items: flex-end;">
<h2>ラーメン屋</h2>
<?php if ($user_id!="") echo $user_id; ?>
</div>
<hr style="margin-top: 10px">
<script>
function getRamen() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition( success, error, option);
		function success(position){
			var data = position.coords;
			var lat = data.latitude;
			var lng = data.longitude;
			var user_id = <?php echo json_encode($user_id); ?>;
			var text = "user_id="+user_id+"&ido="+lat+"&keido="+lng;
			$.post('get_ramen.php', text).done(function(data) {
				address.innerHTML = data;
			});
		}
		function error(error){
			var errorMessage = {
				0: "原因不明のエラーが発生しました。",
				1: "位置情報が許可されませんでした。",
				2: "位置情報が取得できませんでした。",
				3: "タイムアウトしました。",
			};
			document.getElementById('address').innerHTML = errorMessage[error.code];
		}
		var option = {"enableHighAccuracy": true, "timeout": 1000, "maximumAge": 1000,};
	} else {
		alert("現在地を取得できませんでした");
	}
}
</script>
<div id="address"></div>
<br>
<br>
<input type="button" value="チェックイン" class="btn btn-default" onclick="getRamen();">
<br>
<br>
<a href="./">トップページへ戻る</a>
</body>
</html>