<?php
include_once "php_action/db_connect.php";
include_once "php_action/core.php";

$user = $_SESSION['userId'];
$fetch_globeluser = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_id = '$user'"));

$globel_id = $fetch_globeluser['user_id'];
$globel_username = $fetch_globeluser['username'];
$glober_role = $fetch_globeluser['user_role'];

?>

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    
    <?php
       $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";
        $result = $connect->query($sql);
        while($row = $result->fetch_array()) {
            $company_name  = $row['name'];
        ?>

    <title><?php echo $row['name']; ?></title>
  <link rel="icon" href="img/upload/<?= $row['logo']; ?>" type="image/gif" sizes="16x16"> 
    <?php
    $logo = $row['logo'];
    $prefixTax = $row['tax'];
 } 
    ?>
    <style>
        table tr td{
            text-transform:capitalize;
        }

      @media print {
  a[href]:after {
    content: none !important;
  }
} 
    </style>
    
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- morris chart -->
    <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="assets/css/material_style.css">
    <!-- animation -->
    <link href="assets/css/pages/animate_page.css" rel="stylesheet">
    <!-- Template Styles -->
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/formlayout.css" rel="stylesheet" type="text/css" /> 
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="assets/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" /> 
    <!-- Data Table -->
    <link href="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" href="https://resources/demos/style.css">   -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />

    <link rel="stylesheet" href="custom/dropzone/dist/dropzone.css" />
    <link rel="stylesheet" href="custom/css/custom.css" />
    <!-- customizarion start -->
        <!-- Bootstrap Select Css -->
    <link href="css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/app_style.css" rel="stylesheet" />


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="../inc/functions.php"> -->
    <?php include_once 'inc/functions.php'; ?>
 </head>
 <!-- END HEAD -->