<!DOCTYPE html>
<html lang="en">
<?php include('src/LogIn.php'); session_start();?>
<?php include('src/Register.php');?>
<head>
  <title>Management System - Registeration</title>
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
      <li class="nav-item active">
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
          <h1 class="h3 mb-4 text-gray-800">Registeration Portal</h1>
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
                              <p class="mb-0">The default password for every new registerant is Password123.<br>They should be able to change it to whatever password they'd like to use by clicking on the Forgot password link when logining in.</p>
                          </div>
                      </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Job Role</label> 
                        </div>
                        <select class="custom-select" name="role">
                          <option value="">Choose...</option>
                          <option value="Engineer">Engineer</option>
                          <option value="Foreman">Foreman</option>
                          <option value="Plubmer">Plubmer</option>
                          <option value="Painter">Painter</option>
                          <option value="Clean Worker">Clean Worker</option>
                        </select>
                      </div>
                      <span class="text-xs text-danger text-uppercase"><?= $roleErr?></span>
                    </div>
                    <div class="col-sm-6">
                      <div class="custom-file">
                        <input type="file" name="pic" id="inputGroupFile01" accept="image/x-png, image/jpg, image/jpeg" class="custom-file-input">
                        <label class="custom-file-label" for="inputGroupFile01">Upload Picture</label>
                        <span class="text-xs text-danger text-uppercase"><?= $picErr?></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" name="fname" placeholder="First Name" value="<?= $FName ?>">
                      <span class="text-xs text-danger text-uppercase"><?= $fnameErr?></span>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" name="lname" placeholder="Last Name" value="<?= $LName ?>">
                      <span class="text-xs text-danger text-uppercase"><?= $lnameErr?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Gender</label> 
                        </div>
                        <select class="custom-select" name="gender">
                          <option value="">Choose...</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                      </div>
                      <span class="text-xs text-danger text-uppercase"><?= $genderErr?></span>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <label class="input-group-text">Marital Status</label> 
                        </div>
                        <select class="custom-select" name="marital">
                          <option value="">Choose...</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Domestic Partnership">Domestic Partnership</option>
                          <option value="Seperated">Seperated</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>
                      <span class="text-xs text-danger text-uppercase"><?= $maritalErr?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" type="text" name="dob" placeholder="Date Of Birth" value="<?= $DOB ?>">
                      <span class="text-xs text-danger text-uppercase"><?= $dobErr?></span>
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" type="text" name="phone" placeholder="Phone Number" value="<?= $Phone ?>">
                      <span class="text-xs text-danger text-uppercase"><?= $phoneErr?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" type="text" name="nid" placeholder="National ID" value="<?= $Id ?>">
                      <span class="text-xs text-danger text-uppercase"><?= $IdErr?></span>
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" type="text" name="biometric" placeholder="Biometric" value="<?= $Biometric ?>">
                      <span class="text-xs text-danger text-uppercase"><?= $biometricErr?></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="address" placeholder="Mailing Address" value="<?= $Address ?>">
                    <span class="text-xs text-danger text-uppercase"><?= $addressErr?></span>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="email" placeholder="Email Address" value="<?= $Email ?>">
                    <span class="text-xs text-danger text-uppercase"><?= $emailErr?></span>
                  </div>
                  <button type="submit" name="register" class="btn btn-primary btn-user btn-block mt-3">
                    Register User
                  </button>
                </form>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/Script.js"></script>
  <script>
    $(document.getElementById("inputGroupFile01")).on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
    });
  </script>
</body>
</html>