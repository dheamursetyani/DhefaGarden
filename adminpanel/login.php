<?php
session_start();
require "../koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<style>
    .main {
        height: 100vh;
        background: url("../image/deaganteng.png") no-repeat center center;
        background-size: center;
    }

    .login-box {
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
        background-color: #E1ACAC;
    }
    .login-button-custom{
        background-color: #A87676;
        border-color: #A87676;
        color: white;
    }
    .login-button-custom:hover{
        background-color: #E1ACAC;
        border-color: white;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-success login-button-custom form-control mt-3" type="sumbit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3" style = "width: 500px">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($conn, "SELECT*FROM users WHERE username='$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);

                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: ../adminpanel');
                    } 
                    else {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            PASSWORD SALAH
                        </div>
                    <?php
                    }
                } 
                else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        AKUN TIDAK VALID
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>