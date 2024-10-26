<?php session_start();
if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("dashboard-queries2.php"); 
include("language.php");


// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>

<!-- Content -->

				<div class="content-area py-1">
               

					<div class="container-fluid">
                    
                    <h6>This Month of <?=date('F Y') ?> </h6>                    
                    	<div class="row">                        
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-danger mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h2 class="mb-1"><span>&#x20A6;</span><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php if(isset($receivable)){ echo number_format($receivable);}?></h2>
										<h6 class="text-uppercase">Total Sales (Receivable)</h6>
									</div>
								</div>
							</div>                            
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h2 class="mb-1"><span>&#x20A6;</span><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php if(isset($paid_amount)){ echo number_format($paid_amount);}?></h2>
										<h6 class="text-uppercase"><?php echo $lang['TotalReceivedAmount'];?></h6>
									</div>
								</div>
							</div>							
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-warning mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h2 class="mb-1"><span>&#x20A6;</span><?php if(isset($setting_currency)){ echo $setting_currency;}?><?php if(isset($total_discount)){ echo number_format($total_discount);}?></h2>
										<h6 class="text-uppercase">Total Purchase (Payable)</h6>
									</div>
								</div>
							</div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<a href="#" style="color:#FFF"><h2 class="mb-1"><span>&#x20A6;</span> <?php if(isset($revenue)){ echo @number_format($revenue);}?></h2>
										<h6 class="text-uppercase">Petty Cash Balance </h6></a>
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
										<h2 class="mb-0"><?php echo number_format($total_last_sales,2);?></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block bg-white tile tile-4 mb-2">
									<div class="t-icon left bg-success"><i class="ti-bar-chart"></i></div>
									<div class="t-content text-xs-right">
										<h6 class="text-uppercase">Last Month Purchase</h6>
										<h2 class="mb-0"><?php echo number_format($total_last_purchase,2);?></h2>
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
							<div class="col-md-4">
								<div class="box box-block bg-white">
                                <h5 class="t-content text-xs-center">Top Items</h5>
                                
									<div ><table class="table mb-md-0">
										<tbody>
                                        <?php 
								$sql2 = "SELECT prInfo.*, prDetail.* FROM product as prInfo, product_detail as prDetail where prInfo.product_id=prDetail.p_id and prDetail.dead_stock='0' and prInfo.top_item ='1' ORDER BY prDetail.c_id ASc ";
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
												<a href="p_statement.php?pro_id=<?=$row2['product_id']?>" ><?php echo $row2['product_name'];?></a>
												</td>
												<td><?php echo $row2['product_quantity'];?><?php echo $row2['product_sku'];?>
													
												</td>
												
                                                
                                                <td>
													<a  href="invoice.php?i=<?php echo $row2['order_id'];?>"><span class="tag tag-success">view</span></a>
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
							<div class="col-md-8">
								<div class="box bg-white">
									<div class="box-block clearfix">
										<h5 class="float-xs-left">Recent Transfer</h5>
										<div class="float-xs-right">
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
											<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
										</div>
									</div>                                    
									<table class="table mb-md-0">
										<tbody>
                                        <?php 
								$sql2 = "SELECT * FROM `transfer_tb` ORDER BY `order_id` DESC LIMIT 0,9 ";
								$result2 = $conn->query($sql2);
								
								if ($result2->num_rows > 0) 
								{
									// output data of each row
									$i=1;
									while($row2 = $result2->fetch_assoc()) 
									{ ?>
											<tr>
												<th scope="row"><?php echo $i;?></th>
												<td><?php   echo  $row2['date_order_placed'] ; ?></td>
												<td>inter transfer</td>
												<td>
                                             
								
													<a  href="invoice.php?i=<?php echo $row2['order_id'];?>"><span class="underline"><?php   echo  $row2['order_id'] ; ?></span></a>
												</td>
												<td>
													<?php $or_id= $row2['order_id'];
										 $sql3 = "SELECT trans_line_items.*, product.* FROM trans_line_items INNER JOIN product WHERE trans_line_items.product_id = product.product_id and trans_line_items.order_id='$or_id' ORDER BY `order_id` DESC  Limit 0,9";
								$result3 = $conn->query($sql3);
								while($row3 = $result3->fetch_assoc()) {
										echo $row3['product_name']." (".$row3['product_quantity']. " ".$row3['product_sku'].")<br />";

								}
										?>
												</td>
                                                
                                                <td>
													<a  href="invoice.php?i=<?php echo $row2['order_id'];?>"><span class="tag tag-success">view</span></a>
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
