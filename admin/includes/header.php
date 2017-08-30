<!-- start output buffering to support redirection of pages -->
<?php ob_start(); ?>  
<?php require_once("/Applications/MAMP/htdocs/salon/admin/includes/init.php"); ?>

<!-- redirect unauthorised users to the sign-in page if they are not signed in -->
<?php //if (!$session->is_signed_in()) { redirect("signin.php"); } ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Order history &middot;</title>

  <!-- Style links -->
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
  <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
  <link href="assets/css/application.css" rel="stylesheet">
  <link href="assets/css/salon.css" rel="stylesheet">

  <style>
    /* note: this is a hack for ios iframe for bootstrap themes shopify page */
    /* this chunk of css is not part of the toolkit :) */
    body {
      width: 1px;
      min-width: 100%;
      *width: 100%;
    }
  </style>  
</head>

<body>
 
  <div class="container">
    <div class="row">
    
    <!-- Sidebar navigation --> 
    <?php include("navigation.php"); ?>
      