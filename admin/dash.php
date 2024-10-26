<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("dashboard-queries.php"); 
include("language.php");
?>

<!-- Content -->

				<div class="content-area py-1">
               

					<div class="container-fluid">
                    
                    <h6>This Month of <?=date('F Y') ?>  </h6>                    
                    	<div class="row">                        
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-danger mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h2 class="mb-1"><span>&#x20A6;</span><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php if(isset($total_sales)){ echo number_format($total_sales);}?></h2>
										<h6 class="text-uppercase">Total Sales</h6>
									</div>
								</div>
							</div>                            
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h2 class="mb-1"><span>&#x20A6;</span><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php if(isset($total_pur)){ echo number_format($total_pur);}?></h2>
										<h6 class="text-uppercase">Total Purchase</h6>
									</div>
								</div>
							</div>							
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-warning mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h2 class="mb-1"><span>&#x20A6;</span><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php if(isset($total_out)){ echo number_format($total_out);}?></h2>
										<h6 class="text-uppercase">Total Customers Outstanding</h6>
									</div>
								</div>
							</div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<a href="money-balance.php?act=7&cus=303" style="color:#FFF"><h2 class="mb-1"><span>&#x20A6;</span> <?php if(isset($total_cash)){ echo @number_format($total_cash);}?></h2>
										<h6 class="text-uppercase"> Cash Balance (@<?=$vno ?>)</h6><span></span></a>
									</div>
								</div>
							</div>                       		
                          </div>  
                    	<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-danger"><i class="ti-receipt"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Last Month Sales</h6>
										<h2 class="mb-0"><?php echo number_format(0,2);?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-success"><i class="ti-bar-chart"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Last Month Purchase</h6>
										<h2 class="mb-0"><?php echo number_format(0,2);?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-primary"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Total Customers</h6>
										<h2 class="mb-0"><?php if(isset($total_sold_products)){ echo $total_sold_products;}?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-warning"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Total Suppliers</h6>
										<h2 class="mb-0"><?php if(isset($total_sold_product_quantity)){ echo $total_sold_product_quantity;}else{ echo '0';}?></h2>
									</div>
								</div>
							</div>
						</div>
                    	<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-success"><i class="ti-user"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Total Item in Stock</h6>
										<h2 class="mb-0"><?php if(isset($total_customer)){ echo $total_customer;}?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-success"><i class="ti-user"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Total Categories</h6>
										<h2 class="mb-0"><?php if(isset($total_suppliers)){ echo $total_suppliers;}?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-primary"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Total Distributors</h6>
										<h2 class="mb-0"><?php if(isset($total_products)){ echo $total_products;}?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-warning"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Total Staff</h6>
										<h2 class="mb-0"><?php if(isset($total_categories)){ echo $total_categories;}?></h2>
									</div>
								</div>
							</div>
						</div>                       	
						<div class="row row-md mb-2">
							<div class="col-md-6">
								<div class="box box-block bg-white">
                                <h5 class="t-content text-xs-center">Recent Incomes</h5>
                                
									<div ><table class="table mb-md-0">
										<tbody>
                                        <?php 
								$sql2 = "SELECT * FROM `documents` WHERE `document_type` = 31  order by documnents_id DESC Limit 0,9";
								$result2 = $conn->query($sql2);
								
								if ($result2->num_rows > 0) 
								{
									// output data of each row
									$i=1;
									while($row2 = $result2->fetch_assoc()) 
									{ ?>
											<tr>
												<th scope="row"><?php echo $i;?></th>
												
												<td>
                                               
													<a  href="invoice.php?i=<?php echo $row2['document_no'];?>"><span class="underline"><?php echo $row2['document_no'];?></span></a>
												</td>
												<td><?php 
												$sql3 = "SELECT * FROM `ledger_entries`  WHERE `documents_id` = $row2[documnents_id] ";
								$result3 = $conn->query($sql3);
								$row3 = $result3->fetch_assoc();
												
												$sql8 = "SELECT * FROM `customers` WHERE `cus_id` =   $row3[account_id]";
                                            $result8 = $conn->query($sql8);
                                            $row8 = $result8->fetch_assoc();
                                                            
															echo $row8['cus_name'];
															
												?></td>
												<td>
													<span class="text-muted"><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php echo number_format($row3['cr_amount'],2);?></span>
												</td>
                                                
                                                <td>
													<?php   
												$sql8 = "SELECT * FROM `customers` WHERE `cus_id` =   $row3[against]";
												$result8 = $conn->query($sql8);
												$row8 = $result8->fetch_assoc();
																
																echo $row8['cus_name'];



										?>
												</td>
                                                
											</tr>
                                            <?php 
													$i++; }
												} ?>
											
										</tbody>
									</table><br>
<center><input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='sales_receipts.php'")  name="customer_confirm"  value="View More" ></center></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box bg-white">
									<div class="box-block clearfix">
										<h5 class="float-xs-left">Recent Sales</h5>
										<div class="float-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>                                    
									
									<table class="table mb-md-0">
										<tbody>
                                        <?php 
								$sql2 = "SELECT * FROM `documents` WHERE `document_type` = 11  order by documnents_id DESC Limit 0,9";
								$result2 = $conn->query($sql2);
								
								if ($result2->num_rows > 0) 
								{
									// output data of each row
									$i=1;
									while($row2 = $result2->fetch_assoc()) 
									{ ?>
											<tr>
												<th scope="row"><?php echo $i;?></th>
												
												<td>
                                               
													<a  href="invoice.php?i=<?php echo $row2['document_no'];?>"><span class="underline"><?php echo $row2['document_no'];?></span></a>
												</td>
												<td><?php 
												$sql3 = "SELECT * FROM `ledger_entries`  WHERE `documents_id` = $row2[documnents_id] ";
								$result3 = $conn->query($sql3);
								$row3 = $result3->fetch_assoc();
												
												$sql8 = "SELECT * FROM `customers` WHERE `cus_id` =   $row3[account_id]";
                                            $result8 = $conn->query($sql8);
                                            $row8 = $result8->fetch_assoc();
                                                            
															echo $row8['cus_name'];
															
												?></td>
												<td>
													<span class="text-muted"><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php echo number_format($row3['dr_amount'],2);?></span>
												</td>
                                                
                                                
                                                
											</tr>
                                            <?php 
													$i++; }
												} ?>
											
										</tbody>
									</table><br>
<center><input  type="button"  class="btn btn-success checkbox_account" onClick="JAVASCRIPT:window.location ='invoices.php'")  name="customer_confirm"  value="View More" ></center>
								</div>
							</div>
						</div>
						
                       
                        
					</div>
