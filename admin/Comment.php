<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Comments</title>
	<link rel="stylesheet" href="../css/font.min.css">
	<link href="../css/new.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="../css/side-bar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 
      $key = "hhdsfs1263z";
	  include "inc/side-nav.php"; 
      include_once("data/Comment.php");
      include_once("data/Post.php");
      include_once("../db_conn.php");
      $comments = getAllComment($conn);
      

	?>
               
	 <div class="main-table">
	 	<h3 class="mb-3">All Comments</h3>
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

	 	<?php if ($comments != 0) { ?>
	 	<table class="table t1 table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Post Title</th>
		      <th scope="col">Comment</th>
		      <th scope="col">User</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($comments as $comment) {
		  	?>
		    <tr>
		      <th scope="row"><?=$comment['comment_id'] ?></th>
		      <td>
		      	<a href="single_post.php?post_id=<?=$comment['post_id']?>">
		      	<?php 
		      	$p = getByIdDeep($conn, $comment['post_id']);
		      	echo $p['post_title']; ?></a>
		      </td>
		      <td>
		      	<?=$comment['comment']?>
		      </td>
		      <td>
		      	<?php 
		      	$u = getUserByID($conn, $comment['user_id']);
		      	echo '@'.$u['username']; ?>
		      </td>
		      <td>
		      	<a href="comment-delete.php?comment_id=<?=$comment['comment_id'] ?>" class="btn btn-danger">Delete</a>
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
	 	navList.item(3).classList.add("active");
	 </script>
     <script src="../css/bundle.min.js" ></script>
</body>
</html>

<?php }else {
	header("Location: ../admin-login.php");
	exit;
} ?>
