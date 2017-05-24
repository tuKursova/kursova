<?php
	session_start();

	if(isset($_SESSION['admin'])) {
?>
<html>
<head>
	<title>Admin menu</title>
	<link rel="stylesheet" type="text/css"  href="../css/admin.css"></link>
</head>
<body>	
	<?php include "includes/top.php" ?>
	
	something
	
	<?php include "includes/bottom.php" ?>
</body>
</html>
<?php } ?>