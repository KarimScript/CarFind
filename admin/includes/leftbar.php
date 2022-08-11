	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li><a href="#"><i class="fa fa-sitemap"></i> Cars</a>
					<ul>
						<li><a href="add-car.php">Add Car</a></li>
						<li><a href="manage-cars.php">Manage Cars</a></li>
					</ul>
				</li>

				<li><a href="#"><i class="fa fa-files-o"></i> Brands</a>
<ul>
<li><a href="create-brand.php">Create Brand</a></li>
<li><a href="manage-brands.php">Manage Brands</a></li>
</ul>
</li>
				<li><a href="manage-bookings.php"><i class="fa fa-users"></i> Manage Booking</a></li>

				<li><a href="feedback.php"><i class="fa fa-table"></i> Manage FeedBack</a></li>
				<li><a href="manage-contact.php"><i class="fa fa-desktop""></i> Manage Contact</a></li>
				<li><a href="users.php"><i class="fa fa-users"></i>Users</a></li>
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
			<li><a href="contactinfo.php"><i class="fa fa-files-o"></i> System Contact info</a></li>
			<?php if(isset($_SESSION['super'])){?>
				<li><a href="#"><i class="fa fa-users"></i> Admin</a>
					<ul>
						<li><a href="createAdmin.php">Create Admin</a></li>
						<li><a href="Alladmin.php">View Admins</a></li>
					</ul>
				</li>
			<?php }
			?>
			

		

			</ul>
		</nav>