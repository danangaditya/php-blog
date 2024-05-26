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
      include_once("data/Category.php");
      include_once("../db_conn.php");
      $categories = getAll($conn);

	?>
               
	 <div class="main-table">
	 	<h3 class="mb-3">All Categories 
	 		<a href="Category-add.php" class="btn btn-success">Add New</a></h3>
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

	 	<?php if ($categories != 0) { ?>
	 	<table class="table t1 table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Category</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($categories as $category) { ?>
		    <tr>
		      <th scope="row"><?=$category['id'] ?></th>
		      <td><?=$category['category'] ?></td>
		      <td>
		      	<a href="category-delete.php?id=<?=$category['id'] ?>" class="btn btn-danger">Delete</a>
		      	<a href="category-edit.php?id=<?=$category['id'] ?>" class="btn btn-warning">Edit</a>
		      </td>
		    </tr>
		    <?php } ?>
		    
		  </tbody>
		</table>
	<?php }else{ ?>
		<div class="alert alert-warning">
			Empty!
		</div>
	<?php } ?>
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
