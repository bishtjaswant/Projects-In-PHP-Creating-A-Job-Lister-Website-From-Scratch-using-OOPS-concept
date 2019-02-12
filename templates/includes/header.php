<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jobs listing</title>
	<!-- flatly -->
	<!-- <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"> -->
	
	<!-- material css -->
	<link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">

<!-- custom css -->
	<link rel="stylesheet" href="templates/includes/assets/custom.css">
	
</head>
<body>
  <!-- hadder -->

<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li  class="active"><a href="index.php">Home</a></li>
            <li ><a href="create.php"> Create job listing</a></li>
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo SITE_NAME; ?> </h3>
      </div>


      <?php displayMessage(); ?>