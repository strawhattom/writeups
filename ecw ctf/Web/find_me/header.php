<?php

include('functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Find me | Airport Car Rental</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="header-scrolled fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between ">
      <div class="logo">
        <h1><a href="index.php">FIND ME</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="/index.php">Home</a></li>
          <li><a class="nav-link" href="/login.php">Login</a></li>
          <li><a class="nav-link" href="/logout.php">Logout</a></li>
          <?php if(isset($_SESSION['username'])) {
            echo '<li><a class="nav-link" href="/car-info.php">Car Info</a></li>';
            echo '<li><a class="nav-link" href="/my-notes.php">My Notes</a></li>';
            echo '<li><a class="nav-link" href="/ls.php">ls</a></li>';
            echo '<li><a class="nav-link" href="/cat.php">cat</a></li>';
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>
