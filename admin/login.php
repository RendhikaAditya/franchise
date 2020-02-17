<!DOCTYPE html>
<html lang="en">

<head>
    <?php     
    include("components/head.php"); 
    session_start();
    ?>
</head>

<body id="page-top" class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input name="name" type="text" class="form-control" required="required"
                                autofocus="autofocus">
                            <label> Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input name="password" type="password" class="form-control" required="required">
                            <label>Password</label>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Password
                            </label>
                        </div>
                    </div> -->
                    <button name="login" class="btn btn-primary btn-block">Login</button>
                </form>
                <?php
                    if(isset($_POST['login'])){
                        $name = $_POST['name'];
                        $pass = $_POST['password'];

                        include 'components/koneksi.php';
                        $ambil = $koneksi->query("SELECT * FROM tb_admin WHERE admin_username = '$name' AND admin_password = '$pass' ");
                        $akun = $ambil->fetch_object();
                        $cek = $ambil->num_rows;
                        // var_dump($akun);
                        // var_dump($_SESSION['akun']);
                        // exit;

                        if($cek >= 0){

                            $_SESSION['akun'] = $akun;

                            header('location:index.php');
                        }
                        else{
                            echo "<script>
                            alert('password dan username tidak sesuai');
                            window.location='login.php';
                            </script>";
                        }
                        

                    }
                ?>
                <!-- <div class="text-center">
                    <a class="d-block small mt-3" href="register.html">Register an Account</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div> -->
            </div>
        </div>
    </div>

    <?php include("components/script.php"); ?>
</body>

</html>