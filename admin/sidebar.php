<?php //session_start();
//if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
?>

<div class="site-sidebar">
	<div class="custom-scroll custom-scroll-dark">
		<ul class="sidebar-menu">
			<li class="menu-title">Main</li>


			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="index.php" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-tachometer"></i></span>
						<span class="s-text">Dashboard</span>
					</a>

				</li>
			<?php } ?>


			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-product-hunt"></i></span>
						<span class="s-text">Inventory</span>
					</a>
					<ul>
						<?php if ($_SESSION['user_type_id'] != '4') { ?>
							<li><a href="index2.php">Dashbord</a></li>
							<li><a href="add-product.php">New Products/ Services</a></li>

							<li><a href="intertransfers.php">Stock Transfer</a></li>

						<?php } ?>


						<li><a href="stocks.php">Stock Card</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li><a href="warehouse.php">Locations</a></li>
						<li><a href="productionlist.php">Production</a></li>
					</ul>
				</li>
			<?php } ?>

			<!-- <?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3') or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-id-badge"></i></span>
						<span class="s-text"><?php echo $lang['Suppliers']; ?></span>

					</a>
					<ul>
						<?php if ($_SESSION['user_type_id'] != '4') { ?><li><a href="add-supplier.php"><?php echo $lang['AddSupplier']; ?></a></li> <?php } ?>
						<li><a href="suppliers.php"><?php echo $lang['ManageSuppliers']; ?></a></li>
						<li><a href="sup-statement.php">Statement</a></li>
					</ul>
				</li> -->
			<?php } ?>
			<!-- <?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3') or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-user"></i></span>
						<span class="s-text"><?php echo $lang['Customers']; ?></span>
					</a>
					<ul>
						<?php if ($_SESSION['user_type_id'] != '4') { ?><li><a href="add-customer.php"><?php echo $lang['AddCustomer']; ?></a></li>
						<?php } ?>
						<li><a href="customers.php"><?php echo $lang['ManageCustomers']; ?></a></li>
						<li><a href="cus-statement.php">Statements</a></li>

					</ul>
				</li> -->
			<?php } ?>
			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-gift"></i></span>
						<span class="s-text">Sales</span>
					</a>
					<ul>

						<?php if ($_SESSION['user_type_id'] != '4') { ?>
							<li><a href="add-invoice.php?ac_type=1&inv_type=1">New Invoice</a></li>
							<li><a href="add-invoice.php?ac_type=1&inv_type=2">Return Invoice</a></li>
							<?php } ?>
						<li><a href="invoices.php?ac_type=1&showall=1">List Invoices</a></li>
						<li><a href="cus-statement.php?ac_type=1">Customer Statements</a></li>
						<li><a href="customers.php?ac_type=1">List Customers</a></li>
						<li><a href="qoutation-lpos.php?ac_type=1&inv_type=1">Make Quotation</a></li>




					</ul>
				</li>
			<?php } ?>

			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-shopping-cart"></i></span>
						<span class="s-text">Purchases</span>
					</a>
					<ul>

					<?php if ($_SESSION['user_type_id'] != '4') { ?>
							<li><a href="add-invoice.php?ac_type=2&inv_type=1">New Invoice</a></li>
							<li><a href="add-invoice.php?ac_type=2&inv_type=2">Return Invoice</a></li>
							<?php } ?>
						<li><a href="invoices.php?ac_type=2&showall=1">List Invoice</a></li>
						<li><a href="cus-statement.php?ac_type=2">Supplier Statements</a></li>
						<li><a href="customers.php?ac_type=2">List Supplier</a></li>
						<li><a href="purchase_order.php">Make LPO</a></li>
						<!-- <li><a href="lpo.php">Purchase Expense</a></li> -->

					</ul>
				</li>
			<?php } ?>



			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-download"></i></span>
						<span class="s-text">Incomes</span>
					</a>
					<ul>

								<li><a href="sales_pays.php?ac_type=7&showall=1">Sales Inv Incomes </a></li>
								<li><a href="sales_pays.php?ac_type=8&showall=2">Other Incomes </a></li>


					</ul>
				</li>
				<?php } ?>

				<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-external-link"></i></span>
						<span class="s-text">Expenses</span>
					</a>
					<ul>

								<li><a href="purchase_pays.php?ac_type=9&showall=1">Purchase Inv Expenses </a></li>
								<li><a href="purchase_pays.php?ac_type=5&showall=1">Petty Expenses </a></li>
								<li><a href="purchase_pays.php?ac_type=10&showall=1">Other Expenses </a></li>

					</ul>
				</li>
				<?php } ?>


				<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-exchange"></i></span>
						<span class="s-text">Journal Entry</span>
					</a>
					<ul>

								<li><a href="transfers.php?ac_type=4&showall=1">Transfers</a></li>
								<li><a href="transfers.php?ac_type=6&showall=1&inv_type=2">Credit Note</a></li>
								<li><a href="transfers.php?ac_type=6&showall=1&inv_type=2">Debit Note</a></li>

					</ul>
				</li>
				<?php } ?>

				<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '3')  or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-line-chart"></i></span>
						<span class="s-text">Chart of Accounts</span>
					</a>
					<ul>
						<li><a href="account-grp.php">Accounts Types</a></li>
						<li><a href="account-sub.php">Sub Accounts</a></li>
						<li><a href="customers.php?ac_type=3">All Accounts</a></li>
						<li><a href="chart-accts.php">Chart of Accounts</a></li>
					</ul>
				</li>
				<?php } ?>



			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '3') or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-money"></i></span>
						<span class="s-text">Banks & Cash</span>
					</a>
					<ul>
					<?php 	$sql = "SELECT *  FROM `banks_tb` WHERE   bank_status =1" ;
							$result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $i=1;
                                while ($row = $result->fetch_assoc()) {
                    ?>
						<li><a href="money-balance.php?act=7&cus=<?php echo $row['bank_code']; ?>"><?php echo $row['bank_number']; ?> - <?php echo $row['bank_name']; ?></a></li>
					<?php
                                } $i++; 
							}
					?>
                                      
                                 	
						<li><a href="money-balance.php?act=7&cus=303">Cash At Hand</a></li>
						<li><a href="bankslist.php">Manage Banks</a></li>


					</ul>
				</li>
			<?php } ?>


			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1') or ($_SESSION['user_type_id'] == '3')) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-bar-chart"></i></span>
						<span class="s-text"><?php echo $lang['Reports']; ?></span>
					</a>
					<ul>
						<li><a href="item_profit.php"><?php echo $lang['SalesProfit/LossLedger']; ?></a></li>
						<li><a href="day-book.php?i=<?=date('Y-m-d')?>">Day Book</a></li>
						<li><a href="sales_ledger.php">Trail Balance</a></li>
						<li><a href="sales_ledger.php">Balance Sheet</li>
						<li><a href="sales_ledger.php">Payable</li>
						<li><a href="sales_ledger.php">Receivable</li>
						<li><a href="sales_ledger.php"><?php echo $lang['SalesLedger']; ?></a></li>
						<li><a href="expense_ledger.php"><?php echo $lang['ExpensesLedger']; ?></a></li>
						<li><a href="iou.php">I.O.U List</a></li>
						<li><a href="personal.php">Personal List</a></li>
						<li><a href="loan.php">Loan List</a></li>
					</ul>
				</li>
			<?php } ?>



			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2'))) { ?>
				<!-- <li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-view-grid"></i></span>
						<span class="s-text"><?php echo $lang['Categories']; ?> of Prod.</span>
					</a>
					<ul>
						<li><a href="add-category.php"><?php echo $lang['AddCategories']; ?></a></li>
						<li><a href="categories.php"><?php echo $lang['ManageCategories']; ?></a></li>
					</ul>
				</li> -->
			<?php } ?>


			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-user"></i></span>
						<span class="s-text">Marketer/Agent</span>
					</a>
					<ul>
						<li><a href="add-marketer.php">Add Marketer</a></li>
						<li><a href="marketers.php">List Marketer</a></li>
					</ul>
				</li>

			<?php } ?>


			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-home"></i></span>
						<span class="s-text">Departments</span>
					</a>
					<ul>
						<li><a href="add-warehouse.php">Add Deparment</a></li>
						<li><a href="warehouse.php">List Departments</a></li>
					</ul>
				</li>
			<?php } ?>

			<!-- <li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="ti-shopping-cart"></i></span>
								<span class="s-text"><?php echo $lang['ExpiredProducts']; ?></span>
							</a>
							<ul>
								<li><a href="expired-products.php"><?php echo $lang['ExpiredProducts']; ?></a></li>
							</ul>
						</li>-->


			<!-- <?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-shopping-cart"></i></span>
						<span class="s-text"><?php echo $lang['DeadStock']; ?></span>
					</a>
					<ul>
						<li><a href="dead-stock-products.php"><?php echo $lang['DeadStockProduct']; ?></a></li>
					</ul>
				</li>
			<?php } ?> -->


			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '3') or ($_SESSION['user_type_id'] == '4'))) { ?>

				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-money"></i></span>
						<span class="s-text"><?php echo $lang['Loan']; ?></span>
					</a>
					<ul>


						<?php if ($_SESSION['user_type_id'] != '4') { ?><li><a href="add-loan.php"><?php echo $lang['AddLoan']; ?></a></li> <?php } ?>
						<li><a href="loans.php"><?php echo $lang['ManageLoan']; ?></a></li>
					</ul>
				</li>
			<?php } ?>



			<?php if (!empty($_SESSION['user_type_id']) && (($_SESSION['user_type_id'] == '1') or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-user"></i></span>
						<span class="s-text"><?php echo $lang['Staff']; ?></span>
					</a>
					<ul>
						<?php if ($_SESSION['user_type_id'] != '4') { ?><li><a href="add-staff.php"><?php echo $lang['AddStaff']; ?></a></li> <?php } ?>
						<li><a href="staff.php"><?php echo $lang['ManageStaff']; ?></a></li>
						<li><a href="staff.php">Attendance</a></li>
						<li><a href="staff.php">Payroll</a></li>
					</ul>
				</li>
			<?php } ?>



			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3') or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="https://emokleenglobal.com/webmail" target="new" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="fa fa-envelope-o"></i></span>
						<span class="s-text">Go Officail Email</span>
					</a>

				</li>
			<?php } ?>



			<?php if (!empty($_SESSION['user_type_id']) && ($_SESSION['user_type_id'] == '1' or ($_SESSION['user_type_id'] == '2') or ($_SESSION['user_type_id'] == '3') or ($_SESSION['user_type_id'] == '4'))) { ?>
				<li class="with-sub">
					<a href="signout.php" class="waves-effect  waves-light">

						<span class="s-icon"><i class="fa fa-sign-out"></i></span>
						<span class="s-text"><?php echo $lang['SignOut']; ?></span>
					</a>

				</li>
			<?php } ?>


			<?php if (!empty($_SESSION['user_type_id']) && $_SESSION['user_type_id'] == '1') { ?>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-settings"></i></span>
						<span class="s-text"><?php echo $lang['Setting']; ?></span>
					</a>
					<ul>
						<li><a href="company-info.php"><?php echo $lang['CompanyInfo']; ?></a></li>
						<li><a href="database-backup.php">BackUp site database</a></li>
						<li> <a href="signout.php"><?php echo $lang['SignOut']; ?></a></li>
					</ul>
				</li>
			<?php } ?>





		</ul>
	</div>
</div>
