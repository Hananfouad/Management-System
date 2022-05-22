<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION["SessionBiometric"])){
    header("Location: login.php");
} else {
?>
<?php include('src/Count.php');?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Management System - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/Style.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion">
      <div class="sidebar-brand d-flex align-items-center justify-content-center mt-4" id="accordionSidebar">
        <div class="sidebar-brand-icon">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?=$_SESSION['SessionName'];?><br>(<?=$_SESSION['SessionBiometric'];?>)</div>
      </div>
      <hr class="sidebar-divider my-0 mt-3">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Utilities
      </div>
      <li class="nav-item">
        <a class="nav-link" href="assigen.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add A Task</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-tasks"></i>
          <span>Tasks</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tasks List:</h6>
            <a class="collapse-item" href="Pending.php">Pending</a>
            <a class="collapse-item" href="Done.php">Done</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Registered Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registeration.php">
          <i class="fas fa-faw fa-clipboard-list"></i>
          <span>Registeration Portal</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="src/LogOut.php">
          <i class="fas fa-faw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-xl-4">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="printContent('content-wrapper')"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
          </div>
          <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-3">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending tasks</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $PendingCount ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-3">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Done tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $DoneCount ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-3">
            <div class="card shadow mb-4">
              <a href="#collapseCard1" class="d-block card-header py-3" data-toggle="collapse" role="button">
                <h6 class="m-0 font-weight-bold text-primary">First Floor</h6>
              </a>
              <div class="collapse" id="collapseCard1">
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Plumbing
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Painting
                    </span><br>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Clean Working
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button">
                <h6 class="m-0 font-weight-bold text-primary">Second Floor</h6>
              </a>
              <div class="collapse" id="collapseCard2">
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart2"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Plumbing
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Painting
                    </span><br>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Clean Working
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <a href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button">
                <h6 class="m-0 font-weight-bold text-primary">Third Floor</h6>
              </a>
              <div class="collapse" id="collapseCard3">
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart3"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Plumbing
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Painting
                    </span><br>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Clean Working
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <a href="#collapseCard4" class="d-block card-header py-3" data-toggle="collapse" role="button">
                <h6 class="m-0 font-weight-bold text-primary">Forth Floor</h6>
              </a>
              <div class="collapse" id="collapseCard4">
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart4"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Plumbing
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Painting
                    </span><br>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Clean Working
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <a href="#collapseCard5" class="d-block card-header py-3" data-toggle="collapse" role="button">
                <h6 class="m-0 font-weight-bold text-primary">Fifth Floor</h6>
              </a>
              <div class="collapse" id="collapseCard5">
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart5"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Plumbing
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Painting
                    </span><br>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Clean Working
                    </span>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-xl-3 col-lg-3">
              <div class="card shadow mb-4">
                <a href="#collapseCard6" class="d-block card-header py-3" data-toggle="collapse" role="button">
                  <h6 class="m-0 font-weight-bold text-primary">Sixth Floor</h6>
                </a>
                <div class="collapse" id="collapseCard6">
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart6"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Plumbing
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Painting
                      </span><br>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Clean Working
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#collapseCard7" class="d-block card-header py-3" data-toggle="collapse" role="button">
                  <h6 class="m-0 font-weight-bold text-primary">Senventh Floor</h6>
                </a>
                <div class="collapse" id="collapseCard7">
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart7"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Plumbing
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Painting
                      </span><br>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Clean Working
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#collapseCard8" class="d-block card-header py-3" data-toggle="collapse" role="button">
                  <h6 class="m-0 font-weight-bold text-primary">Eighth Floor</h6>
                </a>
                <div class="collapse" id="collapseCard8">
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart8"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Plumbing
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Painting
                      </span><br>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Clean Working
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#collapseCard9" class="d-block card-header py-3" data-toggle="collapse" role="button">
                  <h6 class="m-0 font-weight-bold text-primary">Ninth Floor</h6>
                </a>
                <div class="collapse" id="collapseCard9">
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart9"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Plumbing
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Painting
                      </span><br>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Clean Working
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <a href="#collapseCard10" class="d-block card-header py-3" data-toggle="collapse" role="button">
                  <h6 class="m-0 font-weight-bold text-primary">Tenth Floor</h6>
                </a>
                <div class="collapse" id="collapseCard10">
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart10"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Plumbing
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Painting
                      </span><br>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Clean Working
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg">
              <div class="card shadow mb-3">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tower Summary</h6>
                </div>
                <div class="card-body">
                  <div class="chart-pie pt-6 pb-2">
                    <canvas id="myPieChart11"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Plumbing
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Painting
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Clean Working
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Management System 2020</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/Script.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

  var myPieChart = new Chart(document.getElementById("myPieChart"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows11 ?>, <?= $Rows21 ?>, <?= $Rows31 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart2"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows12?>, <?= $Rows22 ?>, <?= $Rows32 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart3"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows13 ?>, <?= $Rows23 ?>, <?= $Rows33 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
  var myPieChart = new Chart(document.getElementById("myPieChart4"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows14 ?>, <?= $Rows24 ?>, <?= $Rows34 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart5"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows15 ?>, <?= $Rows25 ?>, <?= $Rows35 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart6"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows16 ?>, <?= $Rows26 ?>, <?= $Rows36 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart7"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows17 ?>, <?= $Rows27 ?>, <?= $Rows37 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart8"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows18 ?>, <?= $Rows28 ?>, <?= $Rows38 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart9"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows19 ?>, <?= $Rows29 ?>, <?= $Rows39 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart10"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $Rows110 ?>, <?= $Rows210 ?>, <?= $Rows310 ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });

  var myPieChart = new Chart(document.getElementById("myPieChart11"),
  {
    type: 'doughnut',
    data: {
      labels: ["Plumbing", "Painting", "Clean Working"],
      datasets: [{
        data: [<?= $TotalPlumbing ?>, <?= $TotalPainting ?>, <?= $$TotalCleaning ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
  </script>
  <script>
    function printContent(e){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(e).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
      if (document.getElementById('collapseCard1').hide()) {
        document.getElementById('collapseCard1').show();
      }
    }
</script>
</body>
</html>
<?php
}
?>