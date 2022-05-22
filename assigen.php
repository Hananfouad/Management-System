<!DOCTYPE html>
<html lang="en">
<?php include('src/LogIn.php'); session_start();?>
<?php include('src/Tasks.php');?>
<head>
  <title>Management System - Tasking</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="css/Style.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/Script.js"></script>
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
      <li class="nav-item active">
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
          <h1 class="h3 mb-4 text-gray-800">Tasking Portal</h1>
          <div class="text-xs font-weight-bold text-gray-600 text-uppercase">Please fill in all the fields..</div>
          <span class="text-xl text-success text-uppercase"><?= $Message?></span>
          <span class="text-xl text-danger text-uppercase"><?= $MessageDanger?></span>
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12 pt-3">
                <form class="user" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Note:</h6>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">By choosing the floor and the the operation type, the task will be assigend to the right worker and the foreman will be able to validate if that task is done or still pending.</p>
                            <p class="mb-0">New tasks are placed in the pending tasks list by default untill it's validated to be done by the foreman.</p>
                        </div>
                    </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Floor</label> 
                        </div>
                        <select class="custom-select" name="floor">
                          <option value="">Choose...</option>
                          <option value="1">First</option>
                          <option value="2">Second</option>
                          <option value="3">Third</option>
                          <option value="4">Forth</option>
                          <option value="5">Fifth</option>
                          <option value="6">Sixth</option>
                          <option value="7">Seventh</option>
                          <option value="8">Eighth</option>
                          <option value="9">Ninth</option>
                          <option value="10">Tenth</option>
                        </select>
                      </div>
                      <span class="text-xs text-danger text-uppercase"><?= $floorErr ?></span>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Task</label> 
                        </div>
                        <select class="custom-select" name="type">
                          <option value="">Choose...</option>
                          <option value="Plumbing">Plumbing</option>
                          <option value="Painting">Painting</option>
                          <option value="Clean Working">Clean Working</option>
                        </select>
                      </div>
                      <span class="text-xs text-danger text-uppercase"><?= $typeErr ?></span>
                      <br> <br> <br> <br> <br>
                  </div>
                  <button type="submit" name="task" class="btn btn-primary btn-user btn-block mt-5">
                    Submit 
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white" style="bottom: 0; position: fixed; width: 100%; padding-right: 15%;">
        <div class="container">
          <div class="copyright text-center">
            Copyright &copy; Management System 2020
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/Script.js"></script>
</body>
</html>