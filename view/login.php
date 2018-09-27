<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<!-- General meta information -->
	<title>Login ATM</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="../js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="/WBD-PHP/bank/css/styleLogin.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>
	
</head>
<body>

	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Login</h2>
            <form method="post">
			<div id="username_input">

				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">
					<input type="text" name="userLogin" id="url" onclick="this.value = ''">
					<img id="url_user" src="/WBD-PHP/bank/images/usericon.png" alt="">
				</div>

				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
					<input type="password" name="passLogin" id="url" onclick="this.value = ''">
					<img id="url_password" src="/WBD-PHP/bank//images/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>

			<div id="submit">
				<form method="post">
				<input type="image" src="/WBD-PHP/bank/images/submit_hover.png" id="submit1" value="Sign In">
				<input type="image" src="/WBD-PHP/bank//images/submit.png" id="submit2" value="Sign In">
				</form>
			</div>

                <form method="post">
			<div id="links_left">

			<a href="#">Forgot your Password?</a>

			</div>

			<div id="links_right"><a href="#">Not a Member Yet?</a></div>
                </form>
            </form>
		</div>

		<div id="wrapperbottom"></div>
		
		<div id="powered">
		<p>Powered by CodeGym Bank</p>
		</div>
	</div>

</body>
</html>