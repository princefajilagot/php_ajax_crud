<?php
require_once 'php/init.php';
if(isset($_SESSION['user_id']))
{
    header('Location:/php_oop_crud');
}
$error = logIn();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/main.css">
</head>
<body onload="fetchEmployee()">
    <nav id="navbar-example2" class="navbar bg-dark px-3 mb-3">
        <div class="container">
            <a class="navbar-brand text-white" href="/php_ajax_crud">Employee Management System</a>
            <ul class="nav nav-pills">
                <?php if(!isset($_SESSION['user_id'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="signup.php">Signup</a>
                    </li>
                <?php }else { ?>
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <?php echo $_SESSION['fullname']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#scrollspyHeading3">Admin Profile</a></li>
                            <li><a class="dropdown-item" href="#scrollspyHeading4">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/php_ajax_crud?action=logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="card col-md-4 offset-md-4">
                <div class="card-body">
                    <h3 class="fw-bold text-dark text-center">Login Form</h5>

                    <div class="form-group mt-4">
                        <form action="" method="POST">
                            <div class="col mb-3">
                                <input class="form-control <?php echo $error['is-invalid'] ?? '' ?>" type="text" name="u_id" placeholder="Enter username or email">
                                <div class="<?php echo $error['text-danger'] ?? '' ?>">
                                    <?php echo $error['errorText'] ?? '' ?>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="input-group mb-2">
                                <input class="btn btn-success w-100" type="submit" name="login" value="Login">
                            </div>
                            <span>Don't have an account? <a class="fw-semibold text-decoration-none" href="signup.php">Sign up</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="asset/js/main.js"></script>
</body>
</html>
