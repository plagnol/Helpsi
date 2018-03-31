<?php
session_start();
require '../autoloader.php';
require '../../cache/database/database.php';
require '../model/getSkillsByUserId.php';
require '../model/getUser_idFromUser_key.php';
require '../model/getUserCity.php';

?>
<!DOCTYPE html>
<html lang="en">
    <?php require '../views/head.html';?>
    <body>

    <?php require '../views/menu.php';?>

    <?php
    $UserUpdater = new UserUpdater(getDatabase());
    $isMyProfil = false;

    if(isset($_GET['id'])){
        $usermark = $UserUpdater->getUserTotalMarkFromKey($_GET['id']);
        $id = getUser_idFromUser_key($_GET['id'], getDatabase());
        $school = getUserCity($id, getDatabase());
    }else{
        $usermark = $UserUpdater->getUserTotalMarkFromKey($_SESSION['user_key']);
        $id = getUser_idFromUser_key($_SESSION['user_key'], getDatabase());
    }
    $userProjects =$UserUpdater->getProjectUser($id);
    if ($usermark==-1){
        $TotalMark='Aucun cours dispensé';
    }
    else{
        $TotalMark=$usermark['mark'];
    }
    
    if (empty($_SESSION)) {
        header('location: login.php');
    } else {
        if (! isset($_GET['id'])) {
            $userinfo = $_SESSION;
            $isMyProfil = true;
        } else {
            if ($_SESSION['user_key'] == $_GET['id']) {
                $userinfo = $_SESSION;
                $isMyProfil = true;
            } else {
                $userinfo = $UserUpdater->getUserFromKey($_GET['id']);
            }
        }
        require '../views/pages/profile_view.php';
    }

    ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../../../assets/js/bootstrap.min.js"></script>
	<script src="../../../assets/js/retina-1.1.0.js"></script>
	<script src="../../../assets/js/jquery.hoverdir.js"></script>
	<script src="../../../assets/js/jquery.hoverex.min.js"></script>
	<script src="../../../assets/js/jquery.prettyPhoto.js"></script>
	<script src="../../../assets/js/jquery.isotope.min.js"></script>
	<script src="../../../assets/js/custom.js"></script>



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
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<div id="footerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h4>A propos</h4>
					<div class="hline-w"></div>
					<p>
						Helpsi a été conçu lors du second workshop B1 EPSI par l'équipe
						homonyme de Montpellier composée de : <br> - Anthony Perrin<br> -
						Pierre Noble<br> - Antoine Plagnol<br> - Tom Saunier<br> - Pol
						Rubeillon
					</p>
				</div>
				<div class="col-lg-6">
					<h4>EPSI Montpellier</h4>
					<div class="hline-w"></div>
					<p>
						437 Avenue des Apothicaires,<br /> 34000, Montpellier<br />
						France.<br />
					</p>
				</div>

			</div>
			<! --/row -->
		</div>
		<! --/container -->
	</div>

</body>
</html>
