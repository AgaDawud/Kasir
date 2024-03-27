<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Settings</title>
    <link rel="stylesheet" href="css/settings.css">
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

    <div class="card mx-auto w-75 bg-warning">
        <div class="card-body">
            <div class="fs-3 fw-bold py-5 text-center">
                COMING SOON
            </div>
        </div>
    </div>

<footer class=" bg-primary text-center text-emphasis-dark text-white">
  <div class="container-fluid text-start py-3 text-center">
    &copy Chasier website code v0.8 ( BETA ) by D 
  </div>
</footer>
</body>
</html>