<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    require("src/autoloader.php");
    require("src/views/head_index.html");
    require("cache/database/database.php");
?>
  <body>

	<?php require("src/views/menu_index.php");?>
	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<h3>En collaboration avec l'école d'ingénieurie informatique EPSI.</h3>
					<h1>Helpsi, la plateforme de cours pour les Epsiens.</h1>
					<h5>Quelque soit votre niveau, cherchez les tuteurs qui vous correspondent le mieux, dispensez les cours qui vous plaisent le plus !</h5>
					<h5>A consommer sans modération, pour une fois !</h5>
				</div>
				<div class="col-lg-8 col-lg-offset-2 himg">
					<img src="assets/img/browser.png" class="img-responsive">
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /headerwrap -->

	<!-- *****************************************************************************************************************
	 SERVICE LOGOS
	 ***************************************************************************************************************** -->
	<div id="service">
		<div class="container">
			<div class="row centered">
				<div class="col-md-4">
					<i class="fa fa-heart-o"></i>
					<h4>Partagez votre passion</h4>
					<p>Quelque soit votre niveau, quelques soient vos compétences, vous pouvez vous rendre utile en dispensant des cours à ceux qui en demandent.
						Partagez vos connaissances pour ainsi aider vos futurs collègues à être au niveau !</p>
					<p>
						<br />
						<a href="<?= empty($_SESSION) ? 'src/controller/login.php' : 'src/controller/profile.php?id=' . $_SESSION['user_key']; ?>" class="btn btn-theme">Devenir tuteur</a>
					</p>
				</div>
				<div class="col-md-4">
					<i class="fa fa-flask"></i>
					<h4>"Ca va trop vite !"</h4>
					<p>Vous êtes peut-être perdu(e) dans votre programme? Ou tout simplement en retard sur un cours ?
						N'attendez pas d'être complètement largués avant de demander de l'aide.
						Des âmes charitables sont sur cette plateforme pour vous aider !</p>
					<p>
						<br />
						<a href="src/controller/listEvent.php" class="btn btn-theme">Demander des cours</a>
					</p>
				</div>
				<div class="col-md-4">
					<i class="fa fa-trophy"></i>
					<h4>Devenez le meilleur</h4>
					<p>Que vous soyez tuteur, ou demandeur, plus vous vous investissez dans la plateforme, plus vous avez de chances
					 de rentrer dans le Top 10 des utilisateurs. Plus vous participez, plus vous avez de points !<br>N'attendez plus.</p>
					<p>
						<br />
						<a href="src/controller/signin.php" class="btn btn-theme">M'inscrire</a>
					</p>
				</div>
			</div>
		</div>
		<!--/container -->
	</div>
	<!--/service -->

	<!-- *****************************************************************************************************************
	 PORTFOLIO SECTION
	 ***************************************************************************************************************** -->
	<div id="portfoliowrap">
		<h3>TOP 10 Epsiens</h3>
            <div class="portfolio-centered">
                 <div class="recentitems portfolio">
                <?php
                    $db = getDatabase();
                    $userupdate = new UserUpdater($db);
                    $fetchusers = $userupdate->getTenLastUser();
                    foreach ($fetchusers as $fetchuser)
                    {
                    echo '<div class="portfolio-item graphic-design">
					        <div class="he-wrap tpl6">
						        <img src="'.$fetchuser->avatar .'" alt="" class="img-responsive" style="height: 300px;">
						        <div class="he-view">
							        <div class="bg a0" data-animate="fadeIn">
								        <h3 class="a1" data-animate="fadeInDown">'.$fetchuser->lname.' '.$fetchuser->fname .' ('.$fetchuser->city .')</h3>
								        <a data-rel="profile"
									        href="http://helpsi.freeboxos.fr/src/controller/profile.php?id='.$fetchuser->user_key.'"
									        class="dmbutton a2" data-animate="fadeInDown"><i
									        class="fa fa-search"></i></a>
							        </div>
							<!-- he bg -->
						        </div>
						<!-- he view -->
					        </div>
					    <!-- he wrap -->
				        </div>';
                    }?>

			</div>
			<!-- portfolio -->
		</div>
		<!-- portfolio container -->
	</div>
	<!--/Portfoliowrap -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<div id="footerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h4>A propos</h4>
					<div class="hline-w"></div>
					<p>Helpsi a été conçu lors du second workshop B1 EPSI par l'équipe éponyme de Montpellier composée de : <br>
						- Anthony Perrin<br>
						- Pierre Noble<br>
						- Antoine Plagnol<br>
						- Tom Saunier<br>
						- Pol Rubeillon</p>
				</div>
				<div class="col-lg-6">
					<h4>EPSI Montpellier</h4>
					<div class="hline-w"></div>
					<p>
						 437 Avenue des Apothicaires,<br /> 34000, Montpellier<br /> France.<br />
					</p>
				</div>

			</div>
			<! --/row -->
		</div>
		<! --/container -->
	</div>
	<! --/footerwrap -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
	<script src="assets/js/jquery.isotope.min.js"></script>
	<script src="assets/js/custom.js"></script>


	<script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
</body>
</html>
