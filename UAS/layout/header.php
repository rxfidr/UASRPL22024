<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Legend Guide</title>
    <link rel="icon" href="https://i.pinimg.com/736x/8e/0d/46/8e0d462eef87f64eb590a5d9c848c0c1.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">ML</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Fitur
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="item.php">Items</a></li>
                            <li><a class="dropdown-item" href="hero_power.php">Hero Power</a></li>
                            <li><a class="dropdown-item" href="role_hero.php">Role Hero</a></li>
                            <li><a class="dropdown-item" href="skill_hero.php">Skill Hero</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['username'])) {
                            // Jika sudah login, tampilkan tombol logout
                            echo '<a class="nav-link active" href="logout.php">Logout</a>';
                        } else {
                            // Jika belum login, tampilkan tombol login
                            echo '<a class="nav-link active" href="login_view.php">Login</a>';
                        }
                        ?>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        // Jika sudah login, tampilkan tombol logout
                        if ($_SESSION['level'] == "admin") {
                            echo '<li class="nav-item"><a class="nav-link active" href="halaman_admin.php">Kelola</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>