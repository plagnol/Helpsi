<?php $doc = $_SERVER['PHP_SELF'];?>

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
				<a class="navbar-brand" href="../../../index.php">HELPSI</a>
			</div>
			<div class="navbar-collapse collapse navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="../../../index.php">ACCUEIL</a></li>
                    <li <?= $doc == '/src/controller/listEvent.php' ? 'class="active"' : '';?> ><a href="listEvent.php">COURS</a></li>
					<li <?= $doc == '/src/controller/tutors.php' ? 'class="active"' : '';?>><a href="tutors.php">TUTEURS</a></li>
					<li <?= $doc == '/src/controller/skills.php' ? 'class="active"' : '';?>><a href="skills.php">COMPETENCES</a></li>
					<li <?= $doc == '/src/controller/projects.php' ? 'class="active"' : '';?>><a href="projects.php">PROJETS</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">COMPTE<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?= empty($_SESSION) ? '<li><a href="login.php">SE CONNECTER</a></li>' : '<li><a href="logout.php">SE DECONNECTER</a></li>';?>
                            <?= empty($_SESSION) ? '<li><a href="signin.php">CREER UN COMPTE</a></li>' : '<li><a href="profile.php?id='.$_SESSION['user_key'] . '">MON PROFIL</a></li>';?>
                        </ul>
                    </li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>	