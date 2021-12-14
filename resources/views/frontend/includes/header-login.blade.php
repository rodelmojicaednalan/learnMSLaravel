<?php
if($page=="home"){
	$menu_home_active = 'active';
}
if($page=="about"){
	$menu_about_active = 'active';
}
if($page=="howtolearn"){
	$learnwithus_active = 'active';
	$howtolearn_active = 'active';
}
if($page=="classes"){
	$learnwithus_active = 'active';
	$classes_active = 'active';
}
if($page=="howtoteach"){
	$teachwithus_active = 'active';
	$howtoteach_active = 'active';
}
if($page=="curriculum"){
	$teachwithus_active = 'active';
	$curriculum_active = 'active';
}
if($page=="teacher_handbook"){
	$teachwithus_active = 'active';
	$teacher_handbook_active = 'active';
}
if($page=="collaboratewithus"){
	$collaboratewithus_active = 'active';
}
if($page=="contact"){
	$contact_active = 'active';
}
?>

<header id="header">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-auto logo-wrapper">
				<a href="index.php"><img src="images/orca-logo.png" alt="logo" class="logo" /></a>
			</div>
			<div class="col-md align-items-center nav-wrapper">
				<nav class="navbar navbar-expand-lg navbar-light">

					<div class="collapse navbar-collapse" id="main-menu-list">

						<ul class="navbar-nav">
							<li class="nav-item <?php echo $menu_home_active; ?>">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item <?php echo $menu_about_active; ?>">
								<a class="nav-link" href="about.php">About</a>
							</li>
							<li class="nav-item dropdown">
								<a class="<?php echo $learnwithus_active; ?> nav-link dropdown-toggle" href="#" id="learnwithus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Learn with us</a>
								<div class="dropdown-menu" aria-labelledby="learnwithus">
									<a class="dropdown-item <?php echo $howtolearn_active; ?>" href="howtolearn.php">How to Learn</a>
									<a class="dropdown-item <?php echo $classes_active; ?>" href="classes.php">Classes</a>
									<!-- <a class="dropdown-item" href="#">Pre/Live Recorded Lessons</a> -->
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle <?php echo $teachwithus_active?>" href="#" id="teachwithus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teach with us</a>
								<div class="dropdown-menu" aria-labelledby="teachwithus">
									<a class="dropdown-item <?php echo $howtoteach_active; ?>" href="howtoteach.php">How to Teach</a>
									<a class="dropdown-item <?php echo $curriculum_active; ?>" href="curriculum.php">Curriculum</a>
									<a class="dropdown-item <?php echo $teacher_handbook_active; ?>" href="teacher-handbook.php">Teacher’s Handbook</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php echo $collaboratewithus_active; ?>" href="collaboratewithus.php">Collaborate with us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php echo $contact_active ?>" href="contact.php">Contact</a>
							</li>
						</ul>

					</div>
				</nav>
			</div>

			<div class="col-md-auto text-right btn-wrapper icons-wrapper">
				<!-- Different only this part with login and unlogin -->
				<ul>
					<li>
						<a href="javascript:void(0);">
							<img src="images/icon-envelope.png" alt="icon" />
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<img src="images/icon-user.png" alt="icon" />
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" >
							<img src="images/icon-calendar.png" alt="icon" />
						</a>
					</li>
					<li class="cart-icon-wrap">
						<a href="javascript:void(0);" >

							<img src="images/icon-cart.png" alt="icon" />
							<span class="count rounded-circle">
								4
							</span>
						</a>
					</li>
				</ul>

				<button id="" class="navbar-toggler" type="button">
					<span class="navbar-toggler-icon"></span>
				</button>



			</div>

		</div>
	</div>
</header>
<div id="mobile-menu">

</div>
