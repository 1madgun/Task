<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Training Bootstrap</title>
</head>
<body>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		var home = 'home.php';
		var profil = 'profil.php';
		var contact = 'contact.php';
		$(document).ready(
			function() {
				$('#body').load(home);
				$('#myCarousel').carousel();
			}			
		);
		function onHome() {
			$('#body').empty();
			$('#body').load(home);
		}

		function onProfil() {
			$('#body').empty();
			$('#body').load(profil);
		};

		function onContact() {
			$('#body').empty();
			$('#body').load(contact);
		}

		function check() {
			var email = $('#email').val();
			var messages = $('#message').val();
			
			var mailreg = /^[a-zA-Z0-9_\.]+@([a-z]+\.)+[a-z]{2,4}$/;

			if (mailreg.test(email)) {
				var words = $.trim(messages).split(' ').filter(function(v){return v!==''}).length;

				if (words < 5) {
					alert('Pesan harus lebih dari 5 kata');
				}
				else{
					alert('Terimakasih');

					$('#body').empty();
					$('#body').load(home);
				}
			}
			else{
				alert('Periksa Kembali Email anda');
			}
		}
	</script>
	<nav class="navbar navbar-default navbar-custom">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Training Bootstrap</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a onclick="onHome()" class="hover">Home</a></li>
				<li><a onclick="onProfil()">Profil</a></li>
				<li><a onclick='onContact()'>Contact</a></li>
			</ul>
		</div>
	</nav>
	<div id="body">
		
	</div>
</body>
</html>