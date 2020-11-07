<div class="side-nav fixed">
	<div class="blue-grey darken-3 logo"><a href="index.php" id="logo"><image src="../images/icon.png" style="position: relative; width:100px; height:100px"/></a></div>
	<br/>
	<h5><?php echo ucfirst($_SESSION['type']) . ' Panel';?></h5>
	<hr/>
	<ul class="indent">
		<?php 
			$location = '../Models/sideNavs/';
			include(sideNav($location));
			function sideNav($location){
				switch($_SESSION['type']){
					case 'doc':
						return $location.'doc_side.php';
					case 'rec':
						return $location.'rec_side.php';
					case 'nurse':
						return $location.'nurse_side.php';
					case 'admin':
						return $location.'admin_side.php';
					default:
						session_destroy();
						return '../index.php';
				}
			}
		?>
	</ul>
	<br/>
</div>