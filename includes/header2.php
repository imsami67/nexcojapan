<?php


//session_start();
include_once "php_action/db_connect.php";
include_once "inc/functions.php";



include_once "php_action/core.php";

    $getpage = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
 $checkurlvalid = mysqli_num_rows(mysqli_query($dbc, "SELECT privileges.*,menus.*  FROM privileges INNER JOIN menus ON privileges.nav_id=menus.id WHERE privileges.user_id = '$_SESSION[userId]' AND menus.page='$getpage' "));
 if ($checkurlvalid==0) {?>
 <script type="text/javascript">window.history.back();</script>

  <?php }



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

    <!--select2-->

    <link href="assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

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



<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">



    <!-- <div class="loading loaderAjax">



      <div class="spinner-wrapper">



        <span class="spinner-text">LOADING</span>



        <span class="spinner"></span>



      </div>



    </div> -->



    <input type="text" id="prefixTax" class="d-none" value="<?=$prefixTax?>">



    <div class="page-wrapper">



        <!-- start header -->



        <div class="page-header navbar navbar-fixed-top">



            <div class="page-header-inner ">



                <!-- logo start -->



                <div class="page-logo">



                    <a href="dashboard.php">



                    <!-- <img style="width: 100%" src="img/uploads/<?=$logo?>"> -->



                    <span class="logo-default" ></span> <?=$company_name?></a>



                </div>



                <!-- logo end -->



                <ul class="nav navbar-nav navbar-left in">



                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>



                </ul>



                 <form class="search-form-opened" action="search.php" method="GET">



                    <div class="input-group">



                        <input type="text" class="form-control" placeholder="Search..." name="query">



                        <span class="input-group-btn search-btn">



                          <a href="" class="btn submit">



                             <i class="icon-magnifier"></i>



                           </a>



                        </span>



                    </div>



                </form>



                



                <!-- start mobile menu -->



                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">



                    <span></span>



                </a>



               <!-- end mobile menu -->



                <!-- start header menu -->



                <div class="top-menu">



                    <ul class="nav navbar-nav pull-right">



                        <!-- start notification dropdown -->



                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">



                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">



                                <i class="fa fa-bell-o"></i>



                                <span class="badge headerBadgeColor1"> 6 </span>



                            </a>



                            <ul class="dropdown-menu animated swing">



                                <li class="external">



                                    <h3><span class="bold">Notifications</span></h3>



                                    <span class="notification-label purple-bgcolor">New 6</span>



                                </li>



                                <li>



                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">



                                        <li>



                                            <a href="javascript:;">



                                                <span class="time">just now</span>



                                                <span class="details">



                                                <span class="notification-icon circle deepPink-bgcolor"><i class="fa fa-check"></i></span> Congratulations!. </span>



                                            </a>



                                        </li>



                                        <li>



                                            <a href="javascript:;">



                                                <span class="time">1 mins</span>



                                                <span class="details">



                                                <span class="notification-icon circle purple-bgcolor"><i class="fa fa-user o"></i></span>



                                                <b>Admin </b>Login Now. </span>



                                            </a>



                                        </li>



                                                                      </ul>



                                    <div class="dropdown-menu-footer">



                                        <a href="javascript:void(0)"> All notifications </a>



                                    </div>



                                </li>



                            </ul>



                        </li>



                        <!-- end notification dropdown -->



                        <!-- start message dropdown -->



                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">



                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">



                                <i class="fa fa-envelope-o"></i>



                                <span class="badge headerBadgeColor2"> 2 </span>



                            </a>



                            <ul class="dropdown-menu animated slideInDown">



                                <li class="external">



                                    <h3><span class="bold">Messages</span></h3>



                                    <span class="notification-label cyan-bgcolor">New 2</span>



                                </li>



                                <li>



                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">



                                        <!-- <li>



                                            <a href="#">



                                                <span class="photo">



                                                    <img src="assets/img/user/user2.jpg" class="img-circle" alt=""> </span>



                                                <span class="subject">



                                                    <span class="from"> Sarah Smith </span>



                                                    <span class="time">Just Now </span>



                                                </span>



                                                <span class="message"> Jatin I found you on LinkedIn... </span>



                                            </a>



                                        </li>



                                        <li>



                                            <a href="#">



                                                <span class="photo">



                                                    <img src="assets/img/user/user3.jpg" class="img-circle" alt=""> </span>



                                                <span class="subject">



                                                    <span class="from"> John Deo </span>



                                                    <span class="time">16 mins </span>



                                                </span>



                                                <span class="message"> Fwd: Important Notice Regarding Your Domain Name... </span>



                                            </a>



                                        </li>



                                        <li>



                                            <a href="#">



                                                <span class="photo">



                                                    <img src="assets/img/user/user1.jpg" class="img-circle" alt=""> </span>



                                                <span class="subject">



                                                    <span class="from"> Rajesh </span>



                                                    <span class="time">2 hrs </span>



                                                </span>



                                                <span class="message"> pls take a print of attachments. </span>



                                            </a>



                                        </li>



                                        <li>



                                            <a href="#">



                                                <span class="photo">



                                                    <img src="assets/img/user/user8.jpg" class="img-circle" alt=""> </span>



                                                <span class="subject">



                                                    <span class="from"> Lina Smith </span>



                                                    <span class="time">40 mins </span>



                                                </span>



                                                <span class="message"> Apply for Ortho Surgeon </span>



                                            </a>



                                        </li>



                                        <li>



                                            <a href="#">



                                                <span class="photo">



                                                    <img src="assets/img/user/user5.jpg" class="img-circle" alt=""> </span>



                                                <span class="subject">



                                                    <span class="from"> Jacob Ryan </span>



                                                    <span class="time">46 mins </span>



                                                </span>



                                                <span class="message"> Request for leave application. </span>



                                            </a>



                                        </li> -->



                                    </ul>



                                    <div class="dropdown-menu-footer">



                                        <a href="#"> All Messages </a>



                                    </div>



                                </li>



                            </ul>



                        </li>



                        <!-- end message dropdown -->



                        <!-- start manage user dropdown -->



                        <li class="dropdown dropdown-user">



                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">



                                <!-- <img alt="" class="img-circle " src="img/uploads/<?=$logo?>" /> -->



                                <span class="username username-hide-on-mobile"> <?=$company_name?> </span>



                                <i class="fa fa-angle-down"></i>



                            </a>



                            <ul class="dropdown-menu dropdown-menu-default animated jello">



                                <li>



                                    <a href="setting.php">



                                        <i class="icon-settings"></i> Settings



                                    </a>



                                </li>



                                <li>



                                    <a href="logout.php">



                                        <i class="icon-logout"></i> Log Out </a>



                                </li>



                            </ul>



                        </li>



                        <!-- end manage user dropdown -->



                        <li class="dropdown dropdown-quick-sidebar-toggler">



                             <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">



                               <i class="material-icons">settings</i>



                            </a>



                        </li>



                    </ul>



                </div>



            </div>



        </div>



        <!-- end header -->



        <!-- start page container -->



        <div class="page-container">







            <!-- start sidebar menu -->



            <div class="sidebar-container">



                <div class="sidemenu-container navbar-collapse collapse fixed-menu">



                    <div id="remove-scroll">



                        <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">



                            <li class="sidebar-toggler-wrapper hide">



                                <div class="sidebar-toggler">



                                    <span></span>



                                </div>



                            </li>



                            <li class="sidebar-user-panel">



                                <div class="user-panel">



                                    <div class="row">



                                            <div class="sidebar-userpic">



                                                <img src="img/uploads/<?=$logo?>" class="img-responsive" alt="Error 404"> </div>



                                        </div>



                                        <div class="profile-usertitle">



                                            <div class="sidebar-userpic-name text-center"> <?=$company_name; ?> </div>



                                            <div class="profile-usertitle-job"> <?=$glober_role?> </div>



                                        </div>



                                        <div class="sidebar-userpic-btn">



                                            <a class="tooltips" href="setting.php" data-placement="top" data-original-title="Profile">



                                                <i class="material-icons">person_outline</i>



                                            </a>



                                            <a class="tooltips" href="#" data-placement="top" data-original-title="Mail">



                                                <i class="material-icons">mail_outline</i>



                                            </a>



                                            <a class="tooltips" href="#" data-placement="top" data-original-title="Chat">



                                                <i class="material-icons">chat</i>



                                            </a>



                                            <a class="tooltips" href="logout.php" data-placement="top" data-original-title="Logout">



                                                <i class="material-icons">input</i>



                                            </a>



                                        </div>



                                </div>



                            </li>



<!--                            <li class="menu-heading">



                                <span>-- Main</span>



                            </li>







                            <?php



                            $sort_order = 1;



                            $parent_id = 1;







                  











                            if($glober_role == 'admin'){



            $navbar_heading = mysqli_query($dbc,"SELECT * FROM nav WHERE child_id = '' ORDER BY parent_id ASC ");



            while($heading = mysqli_fetch_assoc($navbar_heading)):



                $parent=$heading['parent_id'];



                $nav_id = $heading['nav_id'];







                    



                            



                    ?>







                     <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons"><?=$heading['icon']?></i>



                                    <span class="title"><?=$heading['heading']?></span>



                                    <span class="arrow"></span>



                                </a>



                <?php



                $child_id_now=$heading['parent_id'];



 







                ?>



                                <ul class="sub-menu">



<?php



                                 $navbar_subheading = mysqli_query($dbc,"SELECT * FROM nav WHERE child_id = '$child_id_now'");



            while($sub = mysqli_fetch_assoc($navbar_subheading)):



       ?>         







                                



                                    <li class="nav-item">



                                        <a href="<?=$sub['url']?>" class="nav-link ">



                                            <span class="title"><?=$sub['heading']?> </span>



                                        </a>



                                    </li>



                                   



                                



                           <?php



                          



                           



                           endwhile;



                      



                           ?>  </ul>   







                            </li>







                           







            <?php



              $sort_order++;



             // $parent_id++;



             endwhile;



        }else{







            $role_base_nav= mysqli_query($dbc,"SELECT * FROM privileges WHERE user_id = '$globel_id'");



            while($role=mysqli_fetch_assoc($role_base_nav)):



                  $navbar_heading = mysqli_query($dbc,"SELECT * FROM nav WHERE nav_id = '$role[nav_id]' ORDER BY nav_id ASC ");



            while($heading = mysqli_fetch_assoc($navbar_heading)):



                ?>







                <li class="nav-item ">



                                <a href="<?=$heading['url']?>" class="nav-link ">



                                    <i class="material-icons"><?=$heading['icon']?></i>



                                    <span class="title"><?=$heading['heading']?></span>



                                </a>



                            </li>











<?php







            endwhile;



             endwhile;



        }//e;lse



             ?>           -->     



                           <!--  <li class="nav-item ">



                                <a href="dashboard.php" class="nav-link ">



                                    <i class="material-icons">dashboard</i>



                                    <span class="title">Dashboard</span>



                                </a>



                            </li>



                             <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">tv</i>



                                    <span class="title">Channels/Relay Order</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="channels.php" class="nav-link ">



                                            <span class="title">Channels</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="relayorder.php" class="nav-link ">



                                            <span class="title">Add Relay Order </span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="show_relayorder.php" class="nav-link ">



                                            <span class="title">Show Relay Order </span>



                                        </a>



                                    </li>



                                </ul>



                            </li>-->







                            <li class="nav-item">



                                <a href="dashboard.php" class="nav-link nav-toggle">



                                    <i class="material-icons">dashboard</i>



                                    <span class="title">Dashboard</span>



                                </a>



                            </li>











                             <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">local_shipping</i>



                                    <span class="title">INVENTORY</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="trade.php" class="nav-link ">



                                               <i class="material-icons">shopping_cart</i>



                                                <span class="title">Add INVENTORY</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="show_trade.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">SHOW INVENTORY</span>



                                            </a>



                                        </li>



                                </ul>



                            </li> <!-- End List -->







                             <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">local_shipping</i>



                                    <span class="title">Leads</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="leads2.php" class="nav-link ">



                                               <i class="material-icons">shopping_cart</i>



                                                <span class="title">Add Leads</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="show_leads2.php" class="nav-link ">



                                               <i class="material-icons">search-btn</i>



                                                <span class="title">SHOW Leads</span>



                                            </a>



                                        </li>



                                </ul>



                            </li> <!-- End List -->











                                                        <!-- start list -->



                        <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">assignment</i>



                                    <span class="title">PAYMENT</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="payment_voucher.php" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">RECEIVED PAYMENT VOUCHERS</span>



                                            </a>



                                        </li>



                                        <li class="nav-item">



                                            <a href="show_voucher.php" class="nav-link ">



                                               <i class="material-icons">list</i>



                                                <span class="title">PAYMENT VOUCHERS LIST</span>



                                            </a>



                                        </li>





                                            <li class="nav-item">



                                    <a href="customers.php?type=bank" class="nav-link nav-toggle">



                                    <i class="material-icons">domain</i>



                                    <span class="title">MANAGE BANK</span>



                                </a>



                                        </li>



                                </ul>



                            </li> <!-- End List -->



                             <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">assignment</i>



                                    <span class="title">CLIENTS</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="customers.php?type=customer" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">ADD CUSTOMER</span>



                                            </a>



                                        </li>



                                        <li class="nav-item">



                                            <a href="consignee.php?consignee_label=consignee" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">ADD CONSIGNEE</span>



                                            </a>



                                        </li>



                                        <li class="nav-item">



                                        <a href="consignee.php?consignee_label=notify_party" class="nav-link ">



                                            <i class="material-icons">add_to_queue</i>



                                            <span class="title">ADD NOTIFY PARTY</span>



                                        </a>



                                    </li>



                                        <li class="nav-item">



                                        <a href="consignee.php?consignee_label=airmail consignee" class="nav-link ">



                                            <i class="material-icons">add_to_queue</i>



                                            <span class="title">ADD AIRMAIL CONSIGNEE</span>



                                        </a>



                                    </li>



                                       



                                </ul>



                            </li> <!-- End List -->



                            <!-- start list -->



                       



                       







                       <!-- start list -->



                        <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">chrome_reader_mode</i>



                                    <span class="title">SALES</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="quotation_form.php" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">QUOTATION GENERNATE</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="quotation_list.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">QUOTATION LIST</span>



                                            </a>



                                        </li>



                                        <li class="nav-item">



                                            <a href="sale_invoices.php?o=add" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">INVOICE GENERNATE</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="invoice_list.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">INVOICE LIST</span>



                                            </a>



                                        </li>



                                        <li class="nav-item">



                                            <a href="invoicemultiple.php" class="nav-link ">



                                               <i class="material-icons">list</i>



                                                <span class="title">MULTIPLE INVOICE/QUATATION</span>



                                            </a>



                                        </li>



                                </ul>



                            </li> <!-- End List -->


                       <!-- start list -->



                        <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">assignment</i>



                                    <span class="title">REPORTS</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="show_reservation.php" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">RESERVATION REPORTS</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="generalledger.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">GENERAL LEDGER</span>



                                            </a>



                                        </li>



                                    



                                </ul>



                            </li> <!-- End List -->

                                                 <!-- start list -->



                        <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">assignment</i>



                                    <span class="title">COMPANIES </span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                        <li class="nav-item">



                                            <a href="ricksu_company.php" class="nav-link ">



                                               <i class="material-icons">add_to_queue</i>



                                                <span class="title">RICKSU COMPANY</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="ricksu_transportation.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">RICKSU TRANSPORTATION</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                            <a href="inspection_company.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">INSPECTION COMPANY</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                          <a href="shipment_company.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">SHIPMENT COMPANY</span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                          <a href="shipper.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">SHIPPER </span>



                                            </a>



                                        </li>



                                         <li class="nav-item">



                                          <a href="services_company.php" class="nav-link ">



                                               <i class="material-icons">search</i>



                                                <span class="title">AIRMAIL COMPANY</span>



                                            </a>



                                        </li>



                                </ul>



                            </li> <!-- End List -->



                            



                                     <!-- start list -->





                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Website Setting</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="set_countries_regulation.php" class="nav-link ">



                                            <i class="material-icons">shopping_cart</i>



                                            <span class="title">Countries Regulation</span>



                                        </a>



                                    </li>



                                    <li class="nav-item">



                                        <a href="ceo_message.php" class="nav-link ">



                                            <i class="material-icons">markunread</i>



                                            <span class="title">CEO Message</span>



                                        </a>



                                    </li>



                               



                                          



                                </ul>



                            </li>







                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Basic Modules</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <?php 



                                    $pages = ['set_countries_regulation','vehicle_features','company','reauction','vehicle_expense', 'auction_grade', 'auction_house','brands', 'cc', 'color_code', 'doors', 'drive', 'fuel', 'interior_grade', 'maker', 'options', 'seats', 'services_company', 'auction_grade', 'transmission', 'transportation', 'users', 'shipper', 'shipment_company','offices'];



                                    foreach ($pages as $key => $value) {



                                        ?>



                                        <li class="nav-item">



                                            <a href="<?=$value?>.php" class="nav-link ">



                                               <i class="material-icons">shopping_cart</i>



                                                <span class="title">



                                                <?php 



                                                    $ext = explode("_", $value);



                                                    foreach ($ext as $value1) {



                                                        echo ucwords($value1)." ";



                                                    }



                                                ?>   



                                                </span>



                                            </a>



                                        </li>



                                    <?php



                                        }



                                    ?>



                                </ul>



                            </li>



                            <!-- 



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Purchase</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="purchase.php" class="nav-link ">



                                            <span class="title">Create Purchase</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="show_purchase.php" class="nav-link ">



                                            <span class="title">Search Purchase</span>



                                        </a>



                                    </li>



                                </ul>



                            </li>



                            



                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Sale</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="orders.php?o=add" class="nav-link ">



                                            <span class="title">Create Order</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="orderslist.php?o=manord" class="nav-link ">



                                            <span class="title">Show Order</span>



                                        </a>



                                    </li>



                                    



                                </ul>



                            </li>



                           







                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Product</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="categories.php" class="nav-link ">



                                            <span class="title">Category</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="brand.php" class="nav-link ">



                                            <span class="title">Brand</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="product.php" class="nav-link ">



                                            <span class="title">Item</span>



                                        </a>



                                    </li>



                                </ul>



                            </li>







                             <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">person_add</i>



                                    <span class="title">people_outline</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="customers.php" class="nav-link ">



                                            <span class="title">Customers</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="marketier.php" class="nav-link ">



                                            <span class="title">Marketier</span>



                                        </a>



                                    </li>



                                   



                                </ul>



                            </li>















                             



                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Operation Report</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="print_sale_report.php" class="nav-link ">



                                            <span class="title">Sales Report</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="print_purchase_report.php" class="nav-link ">



                                            <span class="title">Purchase Report</span>



                                        </a>



                                    </li>



                                </ul>



                            </li>



                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">shopping_cart</i>



                                    <span class="title">Financial Report</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="generalledger.php" class="nav-link ">



                                            <span class="title">Ledger Detail</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="generalledger.php" class="nav-link ">



                                            <span class="title">Trial Balance</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="profit_loss.php" class="nav-link ">



                                            <span class="title">Profit and Loss</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="profit_summary.php" class="nav-link ">



                                            <span class="title">Profit Summary</span>



                                        </a>



                                    </li>



                                </ul>



                            </li>



                            <li class="nav-item">



                                <a href="#" class="nav-link nav-toggle">



                                    <i class="material-icons">settings</i>



                                    <span class="title">Setting</span>



                                    <span class="arrow"></span>



                                </a>



                                <ul class="sub-menu">



                                    <li class="nav-item">



                                        <a href="company.php" class="nav-link ">



                                            <span class="title">Company</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="orders.php?o=manord" class="nav-link ">



                                            <span class="title">Manage Orders</span>



                                        </a>



                                    </li>



                                   <li class="nav-item ">



                                        <a href="customers.php" class="nav-link ">



                                            <span class="title">Customers</span>



                                        </a>



                                    </li> 



                                    <li class="nav-item ">



                                        <a href="chartsofaccount.php" class="nav-link ">



                                            <span class="title">Chart of Account</span>



                                        </a>



                                    </li>



                                    <li class="nav-item ">



                                        <a href="expenses.php" class="nav-link ">



                                            <span class="title">Manage Expenses</span>



                                        </a>



                                    </li>



                                </ul>



                            </li>



                            <li class="nav-item ">



                                <a href="report.php" class="nav-link ">



                                    <i class="material-icons">insert_chart</i>



                                    <span class="title">Report</span>



                                </a>



                            </li>











                        </ul>



                         -->



                    </div>



                </div>



            </div>



            <!-- end sidebar menu -->