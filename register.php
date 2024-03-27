<?php
include_once("connect/koneksi.php");
session_start();

if (isset($_POST['s_login'])) {
    header("Location:dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            $sql_insert = "INSERT INTO user (email, username, password) VALUES ('$email','$username','$password')";

            if ($dbconn->query($sql_insert)) {
                $_SESSION['success'] = true;
                header("Location: register.php");
                exit();
            }
        } catch (mysqli_sql_exception $e) {
            $_SESSION['fail'] = true;
            header("Location: register.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="btn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/log.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="register.php" method="POST">
        <div class="card mx-auto shadow-lg">
            <div class="card-header fw-bold text-center text-success fs-3"><span class="text-primary">Pro</span> Mart</div>
            <div class="card-body">
                <div class="fs-4 fw-bold mb-4 text-center">Register</div>
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success mt-3 mb-5" role="alert"><center>Akun anda berhasil di daftarkan. Silakan ke halaman <a href="login.php">login</a></center></div>';
                    unset($_SESSION['success']);
                }
                ?>
                <?php
                if (isset($_SESSION['fail'])) {
                    echo '<div class="alert alert-danger mt-3 mb-5" role="alert"><center>Username yang anda masukkan sudah ada</center></div>';
                    unset($_SESSION['fail']);
                }
                ?>
                <div class="input-group mb-4">
                    <span class="fa-solid fa-envelope" id="basic-addon1"></span>
                    <input type="text" name="email" class="form-control mx-2" placeholder="Email">
                </div>
                <div class="input-group mb-4">
                    <span class="fa-solid fa-user" id="basic-addon1"></span>
                    <input type="text" class="form-control mx-2" placeholder="Username" name="username">
                </div>
                <div class="input-group mb-5">
                    <span class="fa-solid fa-lock" id="basic-addon1"></span>
                    <input type="password" class="form-control mx-2" placeholder="Password" name="password">
                </div>
                <div class="fs-6 mb-3 ms-3">Lupa Password? <a href="register.php">kirim</a></div>
                <center>
                    <input type="submit" name="register" value="Sign Up" class="btn w-50 mb-3 btn-success"></input>
                </center>
            </div>
        </div>
    </form>
</body>
</html>