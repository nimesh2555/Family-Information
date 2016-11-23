<?php


include('dbconfig.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Happy Family </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smooth-scrolling-->
</head>
<body>
	
	
	<script type="text/javascript">
	$(document).ready(function()
	{ 
		$("#loding1").hide();
		$("#loding2").hide();
		$("#family").change(function()
		{
			$("#loding1").show();
			var id=$(this).val();
			var dataString = 'id='+ id;
			$(".state").find('option').remove();
			$(".city").find('option').remove();
			$.ajax
			({
				type: "POST",
				url: "get_parents.php",
				data: dataString,
				cache: false,
				success: function(html)
				{ 
					$("#loding1").hide();
					$("#parents").html(html);
				} 
			});
		});
		
		
		$("#parents").change(function()
		{
			$("#loding2").show();
			var id=$(this).val();
			var dataString = 'id='+ id;
		
			$.ajax
			({
				type: "POST",
				url: "get_childern.php",
				data: dataString,
				cache: false,
				success: function(html)
				{ 
					$("#loding2").hide();
					$("#children").html(html);
				} 
			});
		});
		
	});
	</script>
	<!--services-start-->
	<div class="process" id="process">
		<div class="container">
		<div class="logo">
			<a href="index.php"><img src="images/logo-5.png" alt="" /></a>
			<div class="clearfix"></div>
		</div>
			<div class="process-top">
				<div class="col-md-6 process-left">
					<h3><span>Selct Family</span></h3>
					<select id="family" class = "form-control">
						<option selected="selected">--- Select Family ---</option>
						<?php
						$sql="SELECT * FROM family_surname ";
						$result = mysql_query($sql);
						if($result === FALSE) { die(mysql_error()); }
						?>
						<?php while ($row = mysql_fetch_array($result)){?>
						<option value="<?php echo $row[0]; ?>"><?php echo $row[1] ?></option>
						<?php } ?>
					  </select>
					<p></p>
				</div>
				<div class="col-md-6 process-left">
					<h3><span>Seelct Parents</span></h3>
					<select name="family" id="parents" class = "form-control">
						<option selected="selected">--- Select Parents ---</option>
						<?php  ?>
						<?php
						$sql="SELECT * FROM parents ";
						$result = mysql_query($sql);
						if($result === FALSE) { die(mysql_error()); }
						?>
						<?php while ($row = mysql_fetch_array($result)){?>
						<option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
						<?php } ?>
						<?php  ?>
						</select>
					<p></p>
				</div>
				<div class="col-md-12 process-left">
					<h3><span>Children Summery</span></h3>
					<p id='children'></p>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--services-ends-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<a href="index.php"><img src="images/logo-5.png" alt="" /></a>
			</div>
			<div class="footer-bottom">
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-ends-->
	<!--copy-starts-->
	<div class="copy">
		<div class="container">
			<div class="copy-top">
				<p class="footer-class">© 2016 Happy Family All Rights Reserved   <a href="" target="_blank"></a> </p>
			</div>
		</div>
		<script type="text/javascript">
									$(document).ready(function() {
										
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--copy-ends-->
</body>
</html>