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
<title>ラーメン店を探す</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div style="display: flex; justify-content: space-between; align-items: flex-end;">
<h2>近くのラーメン店</h2>
<?php if ($user_id!="") echo $user_id; ?>
</div>
<script>
function getRamen() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition( success, error, option);
		function success(position){
			var data = position.coords;
			var lat = data.latitude;
			var lng = data.longitude;
			var lat = 33.5926916;
			var lng = 130.3968849;
			var user_id = <?php echo json_encode($user_id); ?>;
			var text = "user_id="+user_id+"&ido="+lat+"&keido="+lng;
			$.post('near_ramen.php', text).done(function(data) {
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
getRamen();
</script>
<div id="address"></div>
<br>
<br>
<br>
<br>
<a href="./">トップページへ戻る</a>
</div>
</body>
</html>