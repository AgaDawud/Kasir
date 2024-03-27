<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    .alert{
      margin-top: 100px;
      margin-bottom: 325px;
    }

    .offcanvas{
      background-color: aquamarine;
    }
  </style>
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


<div class="alert alert-success w-75 mx-auto" role="alert">
    <div class="fs-2 fw-bold">Selamat datang, <span>
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
    </span>
  </div>
  <div class="fs-4 mt-3">
      Silahkan menuju ke halaman input barang, untuk menyimpan harga barang dan <br />
      nama barang terebut.
  </div> 
    
  </div>

  <footer class=" bg-primary text-center text-emphasis-dark text-white">
    <div class="container-fluid text-start py-3 text-center">
      &copy Chasier website code v0.8 ( BETA ) by D 
    </div>
  </footer>
</body>
</html>
