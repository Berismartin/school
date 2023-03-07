<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include 'conn/conn.php'; ?>
<?php include 'includes/scripts.php'; ?>
  <head>
    <meta charset="utf-8">
    <title>ResultsSys</title>
    <link rel="stylesheet" href="assets/bootstrap4.6.2/css/bootstrap.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/alls.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/custom-table.css">
    <link rel="stylesheet" href="css/streams.css">
    <link rel="stylesheet" href="css/modal-edit.css">
    <link rel="stylesheet" href="css/combo.css">
    <link rel="stylesheet" href="css/students.css">
    <link rel="stylesheet" href="css/subteacher.css">
    <link rel="stylesheet" href="css/result.css">

  </head>
  <body>
    <input type="checkbox" class="check" id="check" >
    <nav class="nav">
      <div class="beris-logo">
        <label for="check"><i class="fa fa-bars"></i></label>
        <p>Dashboard</p>
      </div>
      <div class="log-section">
        <div>
          <p>welcome: beris</p>
          <i class="fa fa-gear"></i>
        </div>
        <div>
          <p>Logout</p>
          <i class="fa fa-sign-out"></i>
        </div>
      </div>
    </nav>

    <!-- side bar navigations -->
    <div class="side-bar">
      <div class="detail-user">

      </div>
      <ul class="side-nav p-0 m-0" id="side-nav">
        <li class="tooltip-bottom"  title="dashboard"> <a href="dashboard.php"> <i class="fa fa-dashboard "></i><span>Dashboard</span> </a> </li>
        <li class="trigger"> <a> <i class="fa fa-angle-right"></i> <span>School files</span></a> </li>
        <div class="triggered">
          <li> <a href="dashboard.php?page=teachers"> <i class="fa fa-user"></i> <span>Teachers</span></a> </li>
          <li> <a href="dashboard.php?page=subjects"> <i class="fa fa-book"></i><span>Subjects </span> </a> </li>
          <li> <a href="dashboard.php?page=years"> <i class="fa fa-calendar"></i> <span>Years</span></a> </li>
          <li> <a href="dashboard.php?page=classes"> <i class="fa fa-crosshairs"></i><span>classes</span> </a> </li>
        </div>

        <li> <a href="dashboard.php?page=results"> <i class="fa fa-file"></i> <span>Results</span></a> </li>
        <li> <a href="dashboard.php?page=streams"> <i class="fa fa-users"></i> <span>Streams</span></a> </li>
        <li> <a href="dashboard.php?page=terms"> <i class="fa fa-users"></i> <span>Terms</span></a> </li>
        <li> <a href="dashboard.php?page=combinations"> <i class="fa fa-users"></i> <span>combine</span></a> </li>
        <li> <a href="dashboard.php?page=students"> <i class="fa fa-users"></i> <span>students</span></a> </li>
      </ul>
    </div>


    <div class="content">
      <div class="mt-3">
        <div class="container">
          <div class="alert_mess"><?php include 'includes/alert.php'; ?></div>
