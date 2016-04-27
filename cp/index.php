
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/docs.min.css" rel="stylesheet">
	<title>兌點成效計算器</title>
</head>
<body>
	



    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>兌點成效計算器</h1>
      </div>
		<?php 
			$avg = '';
			$income = '';
			$rev = '';
			$point = '';
			$value = '';
			$cnt = '';

			if (isset($_POST['avg'])) {$avg = $_POST['avg'];}
			if (isset($_POST['income'])) {$income = $_POST['income'];}
			if (isset($_POST['rev'])) {$rev = $_POST['rev'];}
			if (isset($_POST['point'])) {$point = $_POST['point'];}
			if (isset($_POST['value'])) {$value = $_POST['value'];}
			if (isset($_POST['cnt'])) {$cnt = $_POST['cnt'];}
		?>
		<form method="POST" action="index.php" >
			<div class="form-group">
				<label for="avg">平均消費金額</label>
				<input type="text" class="form-control" name="avg" id="avg" value="<?php echo $avg;?>" placeholder="平均消費金額">
			</div>
			<div class="form-group">
				<label for="income">平均利潤</label>
				<input type="text" class="form-control" name="income" id="income" value="<?php echo $income;?>" placeholder="平均利潤">
			</div>
			<div class="form-group">
				<label for="rev">集點金額 (消費多少元集1點)</label>
				<input type="text" class="form-control" name="rev" id="rev" value="<?php echo $rev;?>" placeholder="集點金額">
			</div>
			<div class="form-group">
				<label for="point">兌換點數</label>
				<input type="text" class="form-control" name="point" id="point" value="<?php echo $point;?>" placeholder="兌換點數">
			</div>
			<div class="form-group">
				<label for="value">商品價值</label>
				<input type="text" class="form-control" name="value" id="value" value="<?php echo $value;?>" placeholder="商品價值">
			</div>
			<div class="form-group">
				<label for="cnt">平均多少消費1次</label>
				<input type="text" class="form-control" name="cnt" id="cnt" value="<?php echo $cnt;?>" placeholder="平均每月消費次數">
			</div>
			<button type="submit" class="btn btn-default">計算</button>
		</form>

		<?php
			
			echo "顧客需消費超過 $".$rev*$point." 才能換到價值 ".$value." 的商品。<br>";
			echo "等同".(($rev*$point)-$value)*10/($rev*$point)."折優惠。<br>";
			echo "顧客需消費至少 ".ceil(($rev*$point)/$avg)." 次，期間需".(($rev*$point)/$avg)*$cnt." 天這麼多天。<br>";
			$r = ($income*ceil(($rev*$point)/$avg))-$value;
			if ($r >= 0) 
			{echo "這樣每人可以帶來 ".$r." 利潤";}
			else
			{echo "這樣每人會帶來 ".abs($r)." 虧損";}
			
		?>
     
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"></p>
      </div>
    </footer>

    <?php
		//echo "兌點商品績效計算器";
	?>
	<!--<form method="POST" action="index.php">
		平均消費金額：<input type="text" name="avg_rev" id="avg_rev">
		<input type="submit" value="計算">
	</form>-->
	<?php 
		//echo $_POST['avg_rev'] ;
	?>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</html>



</body>
</html>
