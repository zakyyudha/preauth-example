<?php
\session_start();

if (!$_SESSION['authenticated']){
    echo "Failed to authenticate";
    return false;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/custom-index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css"/>
    <title>Dashboard - Izin Penyelenggaraan POS</title>
</head>
<body>
<div class="container text-center">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="service-heading-block">
                <h2 class="text-center text-primary title">Hallo, <?= $_SESSION['user_data']['nama'] ?><br>Selamat Datang di Izin Penyelenggaraan POS</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="">
                <a href="./logout.php" class="btn btn-default">Logout</a>
            </div>
        </div>
    </div>

</div>
</body>
<script src="./assets/js/jquery-1.11.1.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
</html>
<?php
unset($_SESSION['user_data']);
unset($_SESSION['authenticated']);
?>
