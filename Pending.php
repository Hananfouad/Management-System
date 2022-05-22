<!DOCTYPE html>
<html lang="en">
<?php include('src/LogIn.php'); session_start();?>
<?php include('src/Tasks.php');?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Management System - Pending Tasks List</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/Style.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion">
      <div class="sidebar-brand d-flex align-items-center justify-content-center mt-4" id="accordionSidebar">
        <div class="sidebar-brand-text mx-3"><?=$_SESSION['SessionName'];?><br>(<?=$_SESSION['SessionBiometric'];?>)</div>
      </div>
      <hr class="sidebar-divider my-0 mt-3">
      <li class="nav-item">
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
      <li class="nav-item active">
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
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pending Tasks</h6>
              <span class="text-xl text-success text-uppercase"><?= $Message?></span>
              <span class="text-xl text-danger text-uppercase"><?= $MessageDanger?></span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Floor</th>
                      <th>Pending</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $Connection = mysqli_connect('localhost', 'root', '', 'database');
                      $Data = mysqli_query($Connection, "SELECT * FROM pending_tasks ORDER BY Id");
                      while ($Result = mysqli_fetch_array($Data)) { ?>
                      <tr>
                        <td><?php echo $Result['Id'];?></td>
                        <td><?php echo $Result['FloorNum'];?></td>
                        <td><?php echo $Result['PendingTask'];?></td>
                        <td><a href="src/Tasks.php?MarkDone=<?php echo $Result['Id'];?>" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                              <span class="text">Mark Done</span>
                            </a>
                        </td>
                        </tr>
                      <?php }
                      mysqli_close($Connection);
                    ?>
                  </tbody>
                </table>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
