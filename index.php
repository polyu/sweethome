<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Our Sweet home</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/loginstyle.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				font-size:36px;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
		<script>
		$(function() {
			$.backstretch([
	      				"images/1.jpg"
	    				,"images/2.jpg"
	    				,"images/3.jpg"
	    				
	  					], {duration: 15000, fade: 750});
		});
		</script>
    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="#">
                    <strong>&laquo; Designed By: </strong> Windcolor & Hellomimi
                </a>
                <span class="right">
                	<!--
                    <a href="http://tympanus.net/codrops/?p=11372">
                        <strong>Older version</strong>
                    </a>
					-->
                </span>
            </div><!--/ Codrops top bar -->
			
			<header>
			
				<h1>Sweet Home <strong>Login Form</strong> Page</h1>
				<h2>Welcome to our sweet home</h2>
				
				

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
			<section class="main">
				<form class="form-4">
				    <h1>Login</h1>
				    <p>
				        <label for="login">Username or email</label>
				        <input type="text" name="login" placeholder="Username or email" required>
				    </p>
				    <p>
				        <label for="password">Password</label>
				        <input type="password" name='password' placeholder="Password" required> 
				    </p>

				    <p>
				        <input type="submit" name="submit" value="Continue">
				    </p>       
				</form>​
			</section>
			
        </div>
    </body>
</html>