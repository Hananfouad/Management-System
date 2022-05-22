<!DOCTYPE html>
<html lang="en">
  <?php include('src/ChangePassword.php');?>
<head>
  <title>Management System - Reset Password</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-4 pt-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12 pt-5">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password<br><span class="text-xs text-danger text-uppercase"><?= $MessageDanger?></span><span class="text-xs text-success text-uppercase"><?= $Message?></span><hr></h1>
                  </div>
                  <form class="user" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                      <input type="text" name="biometric" class="form-control form-control-user mb-4" placeholder="Enter Your Biometric">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Enter Your Password">
                    </div>
                    <br> <br>
                    <button type="submit" name="change" class="btn btn-primary btn-user btn-block mt-3">
                      Submit
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>