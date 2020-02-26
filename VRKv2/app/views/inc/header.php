<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Renar Saaremets">
  <meta name="description" content="Blog with MVC framework">
  <link 
  rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
  crossorigin="anonymous"
  >
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <script
      src="https://kit.fontawesome.com/83a1148b27.js"
      crossorigin="anonymous"
  ></script>
  <title><?php echo SITENAME;?></title>
</head>
<body>
<div class="container">
<?php require APPROOT . "/views/inc/navbar.php"; ?>