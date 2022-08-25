<html lang="en">

<?php
include 'inc/cek_session.php';
include 'inc/koneksi.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Inventaris</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php include "inc/nav.php"; ?>
    </header>

    <main>
        <div id="content" class="text-center m-auto">
            <h2>Welcome !</h2>
            <h3><?php echo $_SESSION['nama']; ?></h3>
        </div> <!-- end content -->
    </main>

    <footer id="footer-top" class="d-flex justify-content-between">
        <span class="m-0">&copy; Inventaris 2022</span>
        <div class="social-media">
            <a href="" class="mr-2"><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
        </div> <!-- end social-media -->
    </footer>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>