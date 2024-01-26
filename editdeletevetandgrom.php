<?php
/*
include_once 'includes/dbh.inc.php';
include_once 'includes/adminfunction.inc.php';
session_start();
$admin_id = $_SESSION["admin_id"];
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
	<!-- My CSS -->
	<link rel="stylesheet" href="css/adminnavside.css">
    <link rel="stylesheet" href="css/admindashboard.css">

	<title>Administrator</title>
</head>
<body>


	<!--START OF SIDEBAR -->
	<form id="sidebar">
		<a href="#" class="brand">
				<div class="logo">
					<img src="images/DoggoLogo.png" width="110" height="110" left="">
			
				</div>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="adminservicestable.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Services</span>
				</a>
			</li>
			
			<li>
				<a href="includes/adminlogout.inc.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</form>
	<!--END OF SIDEBAR -->



	<!--START OF CONTENT -->
	<section id="content">

		<!--START OF NAVBAR -->
		<nav>
			
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
		</nav>
		<!--END OF NAVBAR -->

        	<!--START OF MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Find <br>VET&GROOM</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Add SHOP</span>
				</a>
			</div>

		<!-----DITO YUN MAG SISIMULA------>	
        <div class="admin-wrapper">

        <div class="admin-content">
				<?php
					$select = mysqli_query($conn, "SELECT * FROM `admin`") or die('query failed');
					if(mysqli_num_rows($select) > 0){
					$fetch = mysqli_fetch_assoc($select);
					}
				?>
            <div class="button-group">
                <a href="adminservicestable.php" class="btn btn-primary" type="button">Services Management Post</a>
            </div>
            <?php foreach($query as $value){?>
            <div class="container mt-3">
                <form method="POST" class="row g-6" enctype="multipart/form-data">
				 	<input type="hidden" name="update_admin_id" placeholder="ID" class="col-md-6 form-control bg-white text-dark my-3 text-start"value="<?php echo $_SESSION['admin_id']; ?>">
                    <input type="hidden" name="update_id" placeholder="ID" class="col-md-6 form-control bg-white text-dark my-3 text-start"value="<?php echo $value ['vet_and_groom_ID']; ?>">
				<div class="input-group mb-3">
				<input type="file" name="update_b_logo" class="form-control" accept="image/jpg, image/jpeg, image/png"> 
				</div>	
				<div class="col-md-6">
                    <input type="text" name="update_b_name" placeholder="Business Name" class="col-md-6 form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_name']; ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" name="update_b_owner" placeholder="Business Owner" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_owner']; ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" name="update_b_address" placeholder="Business Address" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_address']; ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" name="update_b_phone" placeholder="Business Phone" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_phone']; ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" name="update_b_city" placeholder="Country" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_email']; ?>">
                </div>
                <div class="col-md-6">
					<input type="email" name="update_b_email" placeholder="Business Email" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_email']; ?>">
                </div>
				<!--NEW-->
				<div class="col-md-15">
					<textarea name="update_b_description" placeholder="Business Description" class="form-control" ><?php echo $value ['b_description']; ?></textarea>
                </div>
				<div class="col-md-6">
					<input type="date" name="update_b_founded_year_in_business" placeholder="Business Founded year and Year In Business" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value['b_founded_year'], date('d-m-y h:i:s'); ?>">
                </div>
				<div class="col-md-6">
					<input type="text" name="update_b_operation_hr" placeholder="Shop Schedule" class="form-control bg-white text-dark my-3 text-start" value="<?php echo $value ['b_operation_hr']; ?>">
                </div>

                <div class="col-md-6">
                    <button name="update-post" class="btn btn-primary">Update</button>
					<button name="delete" class="btn btn-primary">Delete</button>
                </div>
                </form>
             </div>
             <?php } ?>
        </div>
    </div>
		<!--END OF MAIN -->

	<!--END OF CONTENT -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
	<script src="script.js"></script>
</body>
</html>