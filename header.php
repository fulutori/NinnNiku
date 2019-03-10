<nav class="navbar navbar-expand-lg navbar-light bg-maincolor shadow navbar-light fixed-top">
	<div class="container">
	<a class="navbar-brand text-white" href="index.php" style="font-family: fantasy">
	<img src="assets/NinnNiku_white.svg" width="30" height="30" class="d-inline-block align-top mx-1" alt="ブランド">
	NinnNiku</a>
	<div class="navbar-nav ml-auto mt-2 ">
		<a class="nav-item nav-link text-light " href="mypage.php"><b><?php if ($user_id!="") echo $user_id; ?></b></a>
    </div>
	</div>
</nav>
