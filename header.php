<nav class="navbar navbar-expand-lg navbar-light bg-maincolor ">
	<div class="container">
	<a class="navbar-brand text-white" href="index.php">ブランド</a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
		<span class="navbar-toggler-icon"></span>
  	</button>
	
	<div class="collapse navbar-collapse " id="Navber">
		<div class="my-2 my-lg-0 ml-auto">
			<a class="btn btn-outline-light " href="mypage.php"><?php if ($user_id!="") echo $user_id; ?></a>
		</div>
	</div>
	</div>
</nav>
