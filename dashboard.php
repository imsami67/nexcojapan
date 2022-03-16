


<!--header --->
<?php
 include_once "includes/header.php";
//  header("Cache-Control: no-cache, must-revalidate");
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// header("Content-Type: application/xml; charset=utf-8");
?>    

<?php

								$sql = "SELECT * FROM customers WHERE customer_active = 1";

										$result = $connect->query($sql);

										while($roww = $result->fetch_array()) {
											$customer_id = $roww['customer_id'];
											$customer_name = $roww['customer_name'];
											$customer_phone = $roww['customer_phone'];
		$q=mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$customer_id'");
		 // $fetchTransaction = mysqli_fetch_assoc($q);
		 if (mysqli_num_rows($q)==0) {
		 	# code...
		 	//echo "0";
		 }else{
			$temp=0;
		while($row = mysqli_fetch_assoc($q)){
			@$total_debit += $row['debit'];
			@$total_credit+= $row['credit'];
			@$remaing_balance = $row['balance'];
				@$temp=($row['credit']-$row['debit'])+$temp; 
			}
			
		 	  $temp;
		 }//else
												?>
												
	<?php
}
	?>	
<!-- Header end -->
<?php

$sql = "SELECT * FROM orders";
$query = $connect->query($sql);
$totalOrder = $query->num_rows;



$NowDate= date('Y-m-d');

$pre_month = date('Y-m-d', strtotime("-1 months", strtotime("NOW")));


 $sql1 = "SELECT * FROM orders WHERE order_date >='$pre_month' AND order_date <= '$NowDate'";
$query1 = $connect->query($sql1);
$totalOrderbyMonth = $query1->num_rows;


$sqll = "SELECT * FROM customers ";
$queryy = $connect->query($sqll);
$totalCustomer = $queryy->num_rows;

$sqlb = mysqli_query($dbc,"SELECT * FROM budget WHERE budget_type ='expense' ");
while($row=mysqli_fetch_assoc($sqlb)){
	$totalexpencethis = $row['budget_amount']; 
	@$totalexpence = $totalexpence+$totalexpencethis;
}

$sqlem = mysqli_query($dbc,"SELECT * FROM budget WHERE budget_type ='expense' AND budget_date >='$pre_month' AND budget_date <= '$NowDate'  ");
while($row1=mysqli_fetch_assoc($sqlem)){
	$totalexp = $row1['budget_amount']; 
	@$totalexpm = $totalexpm+$totalexp;
}


$sqli = mysqli_query($dbc,"SELECT * FROM budget WHERE budget_type ='income' ");
while($rowi=mysqli_fetch_assoc($sqli)){
	$totalincome = $rowi['budget_amount']; 
	@$totalincomethis = $totalincomethis+$totalincome;
}

$sqlincome = mysqli_query($dbc,"SELECT * FROM budget WHERE budget_type ='income' AND budget_date >='$pre_month' AND budget_date <= '$NowDate'  ");
while($rownow=mysqli_fetch_assoc($sqlincome)){
	$overallincome = $rownow['budget_amount']; 
	@$totalincomenow =$totalincomenow + $overallincome;  
}
?>


 
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
					<div class="state-overview">
						<div class="row">
					        <div class="col-xl-4 col-md-6 col-12">
					          <div class="info-box bg-blue">
					            <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Orders</span>
					              <span class="info-box-number"><?= $totalOrder?></span>
					              <div class="progress">
					                <div class="progress-bar width-60"></div>
					              </div>
					              <span class="progress-description">
					                   Total <?=$totalOrderbyMonth?> Orders This Month 
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-4 col-md-6 col-12">
					          <div class="info-box bg-orange">
					            <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Total Customers</span>
					              <span class="info-box-number"><?=$totalCustomer?></span>
					              <div class="progress">
					                <div class="progress-bar width-40"></div>
					              </div>
					              <span class="progress-description">
					                    40% Increase in 28 Days
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-4 col-md-6 col-12">
					          <div class="info-box bg-purple">
					            <span class="info-box-icon push-bottom"><i class="material-icons">phone_in_talk</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Total Expense </span>
					              <span class="info-box-number"><?=$totalexpence?></span>
					              <div class="progress">
					                <div class="progress-bar width-80"></div>
					              </div>
					              <span class="progress-description">
					                    <strong><?=$totalexpm?></strong>   Last 30 days Expenses   
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>

					        <div class="col-xl-4 col-md-6 col-12">
					          <div class="info-box bg-b-orange">
					            <span class="info-box-icon push-bottom"><i class="material-icons">phone_in_talk</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Total Expense </span>
					              <span class="info-box-number"><?=$totalexpence?></span>
					              <div class="progress">
					                <div class="progress-bar width-80"></div>
					              </div>
					              <span class="progress-description">
					                    <strong><?=$totalexpm?></strong>   Last 30 days Expenses   
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-4 col-md-6 col-12">
					          <div class="info-box bg-b-purple">
					            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Total Earning</span>
					              <span class="info-box-number"><?=@$totalincomethis?></span><span>Rs</span>
					              <div class="progress">
					                <div class="progress-bar width-60"></div>
					              </div>
					              <span class="progress-description">
					                    <?=@$totalincomenow?> Income Last 30 Days
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>

					         <div class="col-xl-4 col-md-6 col-12">
					          <div class="info-box cyan-bgcolor">
					            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Total Earning</span>
					              <span class="info-box-number"><?=@$totalincomethis?></span><span>Rs</span>
					              <div class="progress">
					                <div class="progress-bar width-60"></div>
					              </div>
					              <span class="progress-description">
					                    <?=@$totalincomenow?> Income Last 30 Days
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					      </div>
						</div>
					<!-- end widget -->
                     <!-- chart start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Income & Expense Survey</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9">
                                   <!--  <div class="row text-center">
			                            <div class="col-sm-3 col-6">
			                                <h4 class="margin-0">$ 409 </h4>
			                                <p class="text-muted"> Today's Income</p>
			                            </div>
			                            <div class="col-sm-3 col-6">
			                                <h4 class="margin-0">$ 837 </h4>
			                                <p class="text-muted">This Week's Income</p>
			                            </div>
			                            <div class="col-sm-3 col-6">
			                                <h4 class="margin-0">$ 3410 </h4>
			                                <p class="text-muted">This Month's Income</p>
			                            </div>
			                            <div class="col-sm-3 col-6">
			                                <h4 class="margin-0">$ 78,000 </h4>
			                                <p class="text-muted">This Year's Income</p>
			                            </div>
			                        </div> -->
                       				<div class="row">
                                       	<!-- <div id="area_line_chart" class="width-100"></div> -->
                                       <?php
                                       include_once "tablesurvey.php";
                                       ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Chart end -->
                   <!--  <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="card bg-info">
			                    <div class="text-white py-3 px-4">
			                      <h6 class="card-title text-white mb-0">Page View</h6>
			                      <p>7582</p>
			                      <div id="sparkline26"></div>
			                      <small class="text-white">View Details</small>
			                    </div>
			                  </div>
			                  <div class="card bg-success">
			                    <div class="text-white py-3 px-4">
			                      <h6 class="card-title text-white mb-0">Earning</h6>
			                      <p>3669.25</p>
			                      <div id="sparkline27"></div>
			                      <small class="text-white">View Details</small>
			                    </div>
			                  </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-12">
                        	<div class="card  card-box">
                                <div class="card-head">
                                    <header>Notifications</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9">
                                    <div class="row">
                                        <div class="noti-information notification-menu">
                                            <div class="notification-list mail-list not-list small-slimscroll-style">
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-primary"> <i class="fa fa-user-o"></i>
												</span> <span class="text-purple">Abhay Jani</span> Added you as friend
                                                    <span class="notificationtime">
                                                        <small>Just Now</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon blue-bgcolor"> <i class="fa fa-envelope-o"></i>
												</span> <span class="text-purple">John Doe</span> send you a mail
                                                    <span class="notificationtime">
                                                        <small>Just Now</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-success"> <i class="fa fa-check-square-o"></i>
												</span> Success Message
                                                    <span class="notificationtime">
                                                        <small> 2 Days Ago</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-warning"> <i class="fa fa-warning"></i>
												</span> <strong>Database Overloaded Warning!</strong>
                                                    <span class="notificationtime">
                                                        <small>1 Week Ago</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-primary"> <i class="fa fa-user-o"></i>
												</span> <span class="text-purple">Abhay Jani</span> Added you as friend
                                                    <span class="notificationtime">
                                                        <small>Just Now</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon blue-bgcolor"> <i class="fa fa-envelope-o"></i>
												</span> <span class="text-purple">John Doe</span> send you a mail
                                                    <span class="notificationtime">
                                                        <small>Just Now</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-success"> <i class="fa fa-check-square-o"></i>
												</span> Success Message
                                                    <span class="notificationtime">
                                                        <small> 2 Days Ago</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-warning"> <i class="fa fa-warning"></i>
												</span> <strong>Database Overloaded Warning!</strong>
                                                    <span class="notificationtime">
                                                        <small>1 Week Ago</small>
                                                    </span>
                                                </a>
                                                <a href="javascript:;" class="single-mail"> <span class="icon bg-danger"> <i class="fa fa-times"></i>
												</span> <strong>Server Error!</strong>
                                                    <span class="notificationtime">
                                                        <small>10 Days Ago</small>
                                                    </span>
                                                </a>
                                            </div>
											<div class="full-width text-center p-t-10" >
												<button type="button" class="btn purple btn-outline btn-circle margin-0">View All</button>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Earning</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9">
                                    <div class="row text-center">
			                            <div class="col-sm-4 col-6">
			                                <h4 class="margin-0">$ 209 </h4>
			                                <p class="text-muted"> Today</p>
			                            </div>
			                            <div class="col-sm-4 col-6">
			                                <h4 class="margin-0">$ 837 </h4>
			                                <p class="text-muted">This Week</p>
			                            </div>
			                            <div class="col-sm-4 col-6">
			                                <h4 class="margin-0">$ 3410 </h4>
			                                <p class="text-muted">This Month</p>
			                            </div>
			                        </div>
			                        <div class="row">
                                        <div id="donut_chart" class="width-100 height-250"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                     <!-- start Payment Details -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box" >
                                <div class="card-head">
                                    <header>Orders Details</header>
                                    <div class="tools">
                                    	<button class="fa fa-repeat btn-color box-refresh" id="refresher"></button>
                                      <!--   <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a> -->
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body " id="content">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table5">
												<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>From Date</th>
														<th>To date</th>
														<th>Status</th>
														<th>Phone</th>
														<th>Total Amount</th>
														
														<th>Edit | View</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$sql = mysqli_query($dbc,"SELECT * FROM orders ORDER BY order_id DESC LIMIT 10");
														while($row = mysqli_fetch_assoc($sql)):
														$client = $row['client_name'];
													?>
														
													<tr>
														<td><?=$row['order_id']?></td>
														<td> 
													<?php
													if (is_numeric($client)) {
 			$qq= "SELECT * FROM customers WHERE customer_id = '$client' ";
 			$runn = mysqli_query($dbc,$qq);
 			while ($roww = mysqli_fetch_assoc($runn)) { 
 				 $name = $roww['customer_name']."(Customers)";
 				 $phone = $roww['customer_phone'];
 				 ?>
 				 <span class="label label-lg label-danger" style="font-size: "><?=$name = $roww['customer_name']."(Customers)";?></span>
 				 <?php
 				}
 			}else{
 				?>
 				<?= $client = $row['client_name']."(Walking)";?>
 				<?php
 				
 			}
													?>			
														</td>
														<td><?=$row['from_date']?></td>
														<td><?=$row['to_date']?></td>
														<td>
															<span class="label label-sm label-danger">unpaid</span>
														</td>
														<td><?php
														if(!empty($phone)){
															echo $phone;
														}else{
															echo $row['client_contact'];
														}?></td>
														<td><?=$row['grand_total']?></td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-upload "></i>
															</button>
														</td>
													</tr>
												<?php
													endwhile;
												?>	
												</tbody>
											</table>
										</div>
									</div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Payment Details -->
                    <div class="row">
							<div class="col-lg-8 col-md-12 col-sm-12 col-12">
	                            <div class="card-box ">
	                                <div class="card-head">
	                                    <header>Add Todo List</header>
	                                    <div class="tools">
	                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
		                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
		                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
	                                    </div>
	                                </div>
	                                <div class="card-body ">
                                 	<div class="msg"></div>
		                                <div class="row">
											<div class="col-sm-12">
		                                	<form action="" method="POST" role="form">
		                                	    <div class="form-group">
		                                	    	<label for="">Task Name</label>
		                                	        <input type="text" class="form-control" id="todo_name">
		                                	    </div>
		                                		<button type="button" name="save_todo" onclick="addTodo();" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
		                                	</form>        
		                                	</div>        
		                                </div>	
	                                </div>
	                            </div>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12 col-12">
                             <div class="card-box">
                                 <div class="card-head">
                                     <header>Todo List</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                 </div>
                                 <div class="card-body ">
                                 	<ul class="to-do-list ui-sortable" id="sortable-todo">
										<span id="check"></span>
                                   	</ul>
                                 </div>
                             </div>
                         </div>
						</div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
           <?php
include_once "includes/footer.php";
           ?>