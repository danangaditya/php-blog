<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
	 
    include_once("data/Post.php");
    include_once("../db_conn.php");
    $post = getByIdDeep($conn, $post_id);
    $category = getCategoryById($conn, $post['category']); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - <?=$post['post_title'] ?> </title>
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
         
         <div class="card main-blog-card mb-5">
			  <img src="../upload/blog/<?=$post['cover_url'] ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title"><?=$post['post_title'] ?></h5>
			    <?=$post['post_text'] ?>
			    <hr>
                <p class="card-text d-flex justify-content-between">
                	<b>Category: <?=$category['category']?></b>
                	<small class="text-body-secondary">Date: <?=$post['crated_at'] ?></small>
                </p>
			  </div>
		  </div>
		  
	 </div>
	</section>
	</div>

	 <script>
	 	var navList = document.getElementById('navList').children;
	 	navList.item(1).classList.add("active");
	 </script>
     <script src="../css/bundle.min.js" ></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>
