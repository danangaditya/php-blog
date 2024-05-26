<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Category</title>
	<link rel="stylesheet" href="../css/font.min.css">
	<link href="../css/new.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 
      $key = "hhdsfs1263z";
	  include "inc/side-nav.php"; 

	?>
               
	 <div class="main-table">
	 	<h3 class="mb-3">Create New  Category
	 		<a href="Category.php" class="btn btn-success">Category</a></h3>
	 	<?php if (isset($_GET['error'])) { ?>	
	 	<div class="alert alert-warning">
			<?=htmlspecialchars($_GET['error'])?>
		</div>
	    <?php } ?>

        <?php if (isset($_GET['success'])) { ?>	
	 	<div class="alert alert-success">
			<?=htmlspecialchars($_GET['success'])?>
		</div>
	    <?php } ?>
        <form class="shadow p-3" 
    	      action="req/Category-create.php" 
    	      method="post">

		  <div class="mb-3">
		    <label class="form-label">Category</label>
		    <input type="text" 
		           class="form-control"
		           name="category">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Create</button>
		</form>
	 	
	 </div>
	</section>
	</div>

	 <script>
	 	var navList = document.getElementById('navList').children;
	 	navList.item(2).classList.add("active");
	 </script>
     <script src="../css/bundle.min.js" ></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>
