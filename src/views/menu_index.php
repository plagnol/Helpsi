	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">HELPSI</a>
			</div>
			<div class="navbar-collapse collapse navbar-right">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">ACCUEIL</a></li>
                    <li><a href="src/controller/listEvent.php">COURS</a></li>
					<li><a href="src/controller/tutors.php">TUTEURS</a></li>
					<li><a href="src/controller/skills.php">COMPETENCES</a></li>
					<li><a href="src/controller/projects.php">PROJETS</a></li>
 					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">COMPTE<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?= empty($_SESSION) ? '<li><a href="src/controller/login.php">SE CONNECTER</a></li>' : '<li><a href="src/controller/logout.php">SE DECONNECTER</a></li>';?>
                            <?= empty($_SESSION) ? '<li><a href="src/controller/signin.php">CREER UN COMPTE</a></li>' : '<li><a href="src/controller/profile.php?id='.$_SESSION['user_key'] . '">MON PROFIL</a></li>';?>
						</ul>
					</li>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
