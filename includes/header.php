

<?php







include_once "php_action/core.php";
$user = $_SESSION['userId'];


$fetch_globeluser = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_id = '$user'"));
    $fetchedUserRole=$fetch_globeluser['user_role'];
     $getpage = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    // echo $getpage;
     if($getpage != 'dashboard.php' AND $fetch_globeluser['user_role']!="admin"){
  $checkurlvalid = mysqli_query($dbc, "SELECT privileges.*,menus.*  FROM privileges INNER JOIN menus ON privileges.nav_id=menus.id WHERE privileges.user_id = '$_SESSION[userId]' AND menus.page='$getpage' ");
  if (mysqli_num_rows($checkurlvalid)==0) {?>
  <script type="text/javascript">window.history.back();</script>

   <?php }else{
        $userPrivileges=mysqli_fetch_assoc($checkurlvalid);

   }
}








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
     <link href="css/loader.css" rel="stylesheet" type="text/css" />



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



                    <span class="logo-default" ></span> <?=$company_name?> </a>



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





                            <?php 
 if ($glober_role!='admin'){

                        $getNav = mysqli_query($dbc,"SELECT * FROM menus where parent_id=0 ");
                                 while ($fetch_nav=mysqli_fetch_assoc($getNav)) { 
                                    // if (countWhens($dbc,"privileges",'user_id',$_SESSION['userId'],'nav_id',$fetch_nav['id'])>0) {
                                        $c=0;
                    $getChild = mysqli_query($dbc,"SELECT * FROM menus where parent_id='".$fetch_nav['id']."'  ");
                                 while ($child=mysqli_fetch_assoc($getChild)) {
                                    if (countWhens($dbc,"privileges",'user_id',$_SESSION['userId'],'nav_id',$child['id'])>0) {
                                        $c++;

                                    }}
                                    if ($c>0) {
                                        # code...

                                    
                                    ?>
                                    
                               



                            <li class="nav-item">



                                <a href="<?=$fetch_nav['page']?>" class="nav-link nav-toggle">



                                    <i class="material-icons"><?=$fetch_nav['icon']?></i>



                                    <span class="title"><?=strtoupper($fetch_nav['title'])?></span>
                                      <span class="arrow"></span>



                                </a>

                                <?php 
                                        if (countWhen($dbc,"menus",'parent_id',$fetch_nav['id'])>0) {
                                           
                                       
                                 ?>


                                <ul class="sub-menu">

                                    <?php 
                                    $getChild = mysqli_query($dbc,"SELECT * FROM menus where parent_id='".$fetch_nav['id']."'  ");
                                 while ($child=mysqli_fetch_assoc($getChild)) {
                                    if (countWhens($dbc,"privileges",'user_id',$_SESSION['userId'],'nav_id',$child['id'])>0) {
                                     ?>

                                        <li class="nav-item">



                                            <a href="<?=$child['page']?>" class="nav-link ">



                                               <i class="material-icons"><?=$child['icon']?></i>



                                                <span class="title"><?=strtoupper($child['title'])?></span>



                                            </a>



                                        </li>
                                    <?php } }//end while child ?>
                                </ul>        


                              <?php     }//check statement ?>
                            </li>


                               <?php    }} //end of fetch nav
    }else{

            $getNav = mysqli_query($dbc,"SELECT * FROM menus where parent_id=0 ");
                                 while ($fetch_nav=mysqli_fetch_assoc($getNav)) { 
                                    // if (countWhens($dbc,"privileges",'user_id',$_SESSION['userId'],'nav_id',$fetch_nav['id'])>0) {
                                        $c=0;
                    $getChild = mysqli_query($dbc,"SELECT * FROM menus where parent_id='".$fetch_nav['id']."'  ");
                                 while ($child=mysqli_fetch_assoc($getChild)) {
                                        $c++;

                                    }
                                    if ($c>0) {
                                        # code...

                                    
                                    ?>
                                    
                               



                            <li class="nav-item">



                                <a href="<?=$fetch_nav['page']?>" class="nav-link nav-toggle">



                                    <i class="material-icons"><?=$fetch_nav['icon']?></i>



                                    <span class="title"><?=strtoupper($fetch_nav['title'])?></span>
                                      <span class="arrow"></span>



                                </a>

                                <?php 
                                        if (countWhen($dbc,"menus",'parent_id',$fetch_nav['id'])>0) {
                                           
                                       
                                 ?>


                                <ul class="sub-menu">

                                    <?php 
                                    $getChild = mysqli_query($dbc,"SELECT * FROM menus where parent_id='".$fetch_nav['id']."'  ");
                                 while ($child=mysqli_fetch_assoc($getChild)) {
                              
                                     ?>

                                        <li class="nav-item">



                                            <a href="<?=$child['page']?>" class="nav-link ">



                                               <i class="material-icons"><?=$child['icon']?></i>



                                                <span class="title"><?=strtoupper($child['title'])?></span>



                                            </a>



                                        </li>
                                    <?php  }//end while child ?>
                                </ul>        


                              <?php     }//check statement ?>
                            </li>


                               <?php    }} //end of fetch nav


    }//end of admin

                             ?>


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