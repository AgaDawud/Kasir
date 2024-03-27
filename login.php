<?php
include_once("connect\koneksi.php");
session_start();

if (isset($_SESSION['s_login'])) {
    header("Location:menu/dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepared statement untuk menghindari SQL injection
        $stmt = $dbconn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION['username'] = $data['username'];
            $_SESSION['s_login'] = true;
            header("Location:menu/dashboard.php");
            exit();
        } else {
            $_SESSION['fail'] = true;
            header("Location:login.php");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/log.css">
</head>
<body>
    <form action="login.php" method="post">
        <div class="card mx-auto shadow-lg">
            <div class="card-header fw-bold text-center text-success fs-3"><span class="text-primary">Pro</span> Mart</div>
            <div class="card-body">
                <div class="fs-4 fw-bold mb-4 text-center">Login</div>
                <?php
                if (isset($_SESSION['fail']))   {
                    echo '<div class="alert alert-danger mb-5 mx-5" role="alert"><center>Username dan password salah</center></div>';
                    unset($_SESSION['fail']);
                }
                ?>
                <div class="input-group mb-4">
                    <span class="fa-solid fa-user" id="basic-addon1"></span>
                    <input type="text" class="form-control mx-2" placeholder="Username" name="username">
                </div>
                <div class="input-group mb-5">
                    <span class="fa-solid fa-lock" id="basic-addon1"></span>
                    <input type="password" class="form-control mx-2" placeholder="Password" name="password">
                </div>
                <div class="fs-6 ms-3 mt-2 mb-3">Tidak punya akun? <a href="register.php">Buat</a></div>
                <center>
                    <input type="submit" value="Sign in" name="login" class="btn w-50 mb-3 btn-success"></input>
                </center> 
            </div>
        </div>
    </form>
</body>
</html>