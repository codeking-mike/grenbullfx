	<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="assets/images/lukoil.jpg" height="45" alt="Lukoil" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				
				<!-- end: search & user box -->
			</header>
			<?php
					if(isset($_SESSION['error'])){
						$msg=$_SESSION['error'];
						phpAlert($msg);
						unset($_SESSION['error']);
					}
					
		?>