<?php
include_once("connect/koneksi.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $nama_brg = $_POST['nama_brg'];
        $jml = $_POST['jml'];
        $hrg = $_POST['hrg'];
        $dsk = $_POST['dsk'];

        try {
            $sql_insert = "INSERT INTO input_brg (nama_barang, jumlah, harga, diskon) VALUES ('$nama_brg','$jml','$hrg','$dsk')";
            if ($dbconn->query($sql_insert)) {
                $_SESSION['success'] = true;
                header('Location:input.php');
                exit();
            } 
        } catch (mysqli_sql_exception $e) {
          $_SESSION['fail'] = true;
          header('Location:input.php');
          exit();
        }
    } else if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        try {
            $sql_delete = "DELETE FROM input_brg WHERE id = '$id'";
            if ($dbconn->query($sql_delete)) {
                $_SESSION['success_delete'] = true;
                header('Location:input.php');
                exit();
            } 
        } catch (mysqli_sql_exception $e) {
          $_SESSION['fail_delete'] = true;
          header('Location:input.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/input.css">
    <style>
        .offcanvas{
            background-color: aquamarine;
        }
    </style>
    <title>Input Barang</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand mb-0 h1">Pro Mart</span>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fs-3">Pro Mart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link py-3 btn btn-info" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3 btn btn-info" href="input.php">Input Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3 btn btn-info" href="pengaturan.php">Pengaturan</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <form action="input.php" method="post">
                <div class="card mx-auto">
                <h5 class="card-header py-4 text-center">Inputkan Barangnya</h5>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['success'])) {
                            echo '<div class="alert alert-success mt-3 mx-auto w-75 " role="alert"><center>Barang berhasil di tambahkan</center></div>';
                            unset($_SESSION['success']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['fail'])) {
                            echo '<div class="alert alert-danger mt-3 mx-auto w-75 " role="alert"><center>Barang sudah di tambahkan</center></div>';
                            unset($_SESSION['fail']);
                        }
                        ?>
                        <div class="input-group mb-3 mt-3">
                            <i class="fa-solid fa-pen-clip"></i>
                            <input type="text" name="nama_brg" placeholder="Nama Barang" class="form-control me-4 ms-2">
                        </div>
                        <div class="input-group mb-3">
                            <i class="fa-solid fa-arrow-up-wide-short"></i>
                            <input type="number" name="jml" placeholder="Jumlah" class="form-control me-4 ms-2">
                        </div>
                        <div class="input-group mb-3">
                            <i class="fa-solid fa-tags"></i>
                            <input type="number" name="hrg" placeholder="Harga" class="form-control me-4 ms-2">
                        </div>
                        <div class="input-group mb-3">
                            <i class="fa-solid fa-percent"></i>
                            <input type="number" name="dsk" placeholder="Diskon" class="form-control me-4 ms-2">
                        </div>
                        <center>
                            <input type="submit" name="submit" value="Submit" class="btn w-50 mt-5 mb-3 btn-success"></input>
                        </center>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6 mx-auto">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="text-center">Barang</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Diskon</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_query = mysqli_query($dbconn, "SELECT * FROM input_brg");
                    
                    $total = 0;
                    while($brg = mysqli_fetch_assoc($sql_query)){ 
                        $nama_barang = $brg['nama_barang'];
                        $jumlah = $brg['jumlah'];
                        $harga = $brg['harga'];
                        $diskon = $brg['diskon'];

                        $subtotal = $jumlah * $harga - $diskon; 
                        $total += $subtotal;
                    ?>
                    <tr class="table-info">
                        <td class="text-center"><?php echo $nama_barang; ?></td>
                        <td class="text-center"><?php echo $jumlah; ?></td>
                        <td class="text-center"><?php echo $harga; ?></td>
                        <td class="text-center"><?php echo $diskon; ?></td>
                        <td>
                        <form action="input.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $brg['id']; ?>">
                            <center>
                                <input type="submit" value="Cancel" name="delete" class="btn btn-danger btn-sm">
                            </center>
                        </form>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th class="fw-bold">Total: </th>
                        <th class="table-info">
                            <?php 
                            echo $total;
                            ?>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="text-white my-3">
    <?php
      include_once("connect/koneksi.php");
      $query_sql = mysqli_query($dbconn, "SELECT * FROM user");
      $username = mysqli_fetch_assoc($query_sql);
      
      if ($username) {
            echo $username['username'];
        } else {
            header("Location:login.php");
        }
        ?>
    </div>
    <footer class=" bg-primary text-center text-emphasis-dark text-white">
        <div class="container-fluid text-start py-3 text-center">
            &copy Chasier website code v0.8 ( BETA ) by D 
        </div>
    </footer>
</body>
</html>
