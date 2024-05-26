<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['user_id'];
    }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
           <link href="css/index.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
        include 'inc/NavBar.php';
	 ?>
     <div class="main-banner">
     <script src="css/index.js"</script>	
     </div>
</body>
</html>
