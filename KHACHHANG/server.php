
<?php 
require_once './services/conn.php'; 
require_once './services/productServices.php';
require_once './MDB/MDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./ASSETS/css/base.css">
    <link rel="stylesheet" type="text/css" href="./ASSETS/css/reset.css">
    <link rel="stylesheet" type="text/css" href="./ASSETS/css/style.css">
    <link rel="stylesheet" type="text/css" href="./ASSETS/font/fontawesome/css/all.css">



</head>
<body>

    <!-- HEADER -->
    <?php require_once './php/header.php' ?>
    <!-- CLOSE HEADER -->




    <!-- BODY -->
    <?php 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        require_once "./php/$page";
    }
    else{
        require_once './php/home.php';
    }
    ?>
    <!-- CLOSE BODY -->




    <!-- FOOTER -->
    <?php require_once './php/footer.php' ?>
    <!-- CLOSE FOOTER -->
    
</body>
</html>

    <!-- MDB -->
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"
></script>