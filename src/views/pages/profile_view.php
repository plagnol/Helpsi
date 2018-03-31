
<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
<div id="blue">
	<div class="container">
		<div class="row">
			<h3 class="mt-2">
				<img src="<?= $userinfo['avatar'];?>"
					style="width: 50px; height: 50px; border-radius: 25px; margin-right: 10px;"
					class="mr-2"><span><?= $userinfo['fname'] . ' ' . $userinfo['lname'];?>.</span>
			</h3>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /blue -->

<!-- *****************************************************************************************************************
	 TITLE & CONTENT
	 ***************************************************************************************************************** -->

<div class="container mt">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 centered">
			<div id="carousel-example-generic" class="carousel slide"
				data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0"
						class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="../../assets/img/portfolio/single01.jpg" alt="">
					</div>
					<div class="item">
						<img src="../../assets/img/portfolio/single02.jpg" alt="">
					</div>
					<div class="item">
						<img src="../../assets/img/portfolio/single03.jpg" alt="">
					</div>
				</div>
			</div>
			<!--/Carousel -->
		</div>

		<div class="col-lg-5 col-lg-offset-1">
			<div class="spacing"></div>
			<h4>A PROPOS</h4>
                <?php if($isMyProfil){ echo '<a href="editProfil.php"> Modifier votre profil </a>';}?>
                <p> Note moyenne en tutorat : <?= $TotalMark ?></p>
		 		<p><?= $userinfo['bio'];?></p>

			<h4>Compétences</h4>
                <?php
                $use_id = getUser_idFromUser_key($userinfo['user_key'], getDatabase());
                $arraySkill = getSkillsByUserId($use_id, getDatabase());
                ?>
            <ul class="list-group">
                <?php
                    foreach ($arraySkill as $result){
                        echo '<li class="list-group-item"><b>' . $result['name'] . '</b> - <span> '. $result['mark'] .' / 5</span></li>';
                    }
                ?>
            </ul>
                <?php
                if($isMyProfil){ echo '<a href="editSkills.php?action=""> Modifier vos compétences </a>';}
                ?>
		</div>
		<!-- LISTE DES COMPETENCES ICI -->
		<div class="col-lg-4 col-lg-offset-1">
			<div class="spacing"></div>
			<h4>Informations de contact</h4>
			<div class="hline"></div>
			<br>
                <?php if($isMyProfil){ echo '<a href="editContact.php"> Modifier vos informations de contact </a>';}?>
		 		<p>
				<i class="fas fa-at" style="margin-right: 10px;"></i><?= $userinfo['mail'];?></p>
			    <p>
				<i class="fas fa-phone" style="margin-right: 10px;"></i><?= $userinfo['phone'];?></p>
                <p>
                <i class="glyphicon glyphicon-home" style="margin-right: 10px;"></i><?= $school->city;?></p>
		 		<?= !empty($userinfo['facebook']) ? '<p><i class="fab fa-facebook-messenger" style="margin-right:10px;"></i>  ' . $userinfo['facebook'] . '</p>' : '';?>
		 		<?= !empty($userinfo['discord']) ? '<p><i class="fab fa-discord" style="margin-right:10px;"></i>  ' . $userinfo['discord'] . '</p>' : '';?>
		 		<?= !empty($userinfo['linkedin']) ? '<p><i class="fab fa-linkedin-in" style="margin-right:10px;"></i>  ' . $userinfo['linkedin'] . '</p>' : '';?>
		 		<?= !empty($userinfo['skype']) ? '<p><i class="fab fa-skype" style="margin-right:10px;"></i>  ' . $userinfo['skype'] . '</p>' : '';
		 		?>
                <?php
                if($isMyProfil){
                    echo '<a href="eventList.php?id='. $userinfo['user_key'] . '">Voir vos anciens cours </a><br> ';
                    echo '<a href="eventListNext.php?id='. $userinfo['user_key'] . '">Voir vos prochains cours </a><br> ';
                    echo '<a href="disponibility.php?id='. $userinfo['user_key'] . '"> Gérer vos disponibilités </a><br> ';
                }
                echo '<a href="myDisponibility.php?id='. $userinfo['user_key'] . '">Voir ses disponibilités </a> ';

                ?>
        </div>

	</div>
	<!--/row -->
</div>
<!--/container -->

<!-- *****************************************************************************************************************
	 PORTFOLIO SECTION
	 ***************************************************************************************************************** -->
<div id="portfoliowrap">
	<div class="portfolio-centered">
		<h3>Projets d'utilisateur.</h3>
		<div class="recentitems portfolio">
            <?php
            foreach($userProjects as $result){
                echo '<a href="projectProfile.php?id='. $result['project_id'] .'">';
                echo '<div class="portfolio-item graphic-design align-center">';
                echo '<div class="he-wrap tpl6">';
                echo '<img src="'. $result['img'] .'" alt="" style="height:350px;">';
                echo '<div class="he-view">';
                echo '<div class="bg a0" data-animate="fadeIn">';
                echo '<h3 class="a1" data-animate="fadeInDown">'.$result['name'].'</h3>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
            
            
            ?>
		</div>
		<!-- portfolio -->
	</div>
	<!-- portfolio container -->
</div>
<!--/Portfoliowrap -->
