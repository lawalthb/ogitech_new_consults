<div class="site-header">
				<nav class="navbar navbar-light">
				<div class="navbar-left">
						<a class="navbar-brand" href="index.php">
						<img src="img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>"  width="100" height="60" >
						</a>
						<div class="toggle-button light sidebar-toggle-first float-xs-left hidden-md-up">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second dark float-xs-right hidden-md-up">
							<i class="ti-arrow-left"></i>
						</div>
						<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
							<span class="more"></span>
						</div>
					</div>
					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">

						<div class="toggle-button sidebar-toggle-second float-xs-left hidden-sm-down light">
							<span class="hamburger"></span>
						</div>
						<!--<div class="toggle-button-second dark float-xs-right hidden-sm-down">
							<i class="ti-arrow-left"></i>
						</div>-->

						<ul class="nav navbar-nav float-md-right">
							<li class="nav-item dropdown">
								<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">

								<?php if(isset($setting_name)) echo $setting_name;?> (<?php $sql = "SELECT `auth`.*, `users_type`.* FROM `auth`, `users_type` WHERE auth.user_type_id=users_type.user_type_id  and  `auth`.auth_id='".$_SESSION['auth_id']."' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
		// output data of each row
		while($row = $result->fetch_assoc())
		{
			$auth_id =$row['auth_id'];


			echo   $full_name =$row['user_type']."-";
			echo $auth_username =$row['auth_username'];
		}
	}?>) <!--<?php echo $lang['Languages'];?>
                                    <span class="s-caret"><i class="fa fa-angle-down"></i></span>	-->
								</a>
								<!--<div class="dropdown-menu dropdown-menu-right animated fadeInUp">

									<a class="dropdown-item" href="language.php?lang=en">English</a>
                                    <a class="dropdown-item" href="language.php?lang=fr">French</a>
                                    <a class="dropdown-item" href="language.php?lang=in">Indonesian</a>
								</div>-->
							</li>
							<li class="nav-item dropdown hidden-sm-down">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<span class="avatar box-32">
										<img src="img/avatars/default.jpg" alt="">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right animated fadeInUp">

                                    <a class="dropdown-item" href="profile.php">
										<i class="ti-user mr-0-5"></i> <?php echo $lang['Profile'];?>
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="doc/index.html" target="new"><i class="ti-help mr-0-5"></i> Help</a>
									<a class="dropdown-item" href="signout.php"><i class="ti-power-off mr-0-5"></i> <?php echo $lang['SignOut'];?></a>
									<a class="dropdown-item" href="https:emokleenglobal.com/webmail" target="new" ><i class="fa fa-envelope-o"> </i> Go Officail Email</a>
								</div>
							</li>
						</ul>
						<ul class="nav navbar-nav">
							<li class="nav-item hidden-sm-down light">
								<a class="nav-link toggle-fullscreen" href="#">
									<i class="ti-fullscreen"></i>
								</a>
							</li>
						</ul>


						<div class="header-form float-md-left ml-md-2">
							<form name="quick_search" method="get" target="_blank" action="customer_statement_pdf.php">

							<input type="text" class="customerSelection form-control" placeholder="Search for Ledger..."   autocomplete="off" name="i"  id="customer_name"  require  />

<input id="customer_id" class="hidden_value" type="hidden" name="cus_id">


								<button type="submit" class="btn bg-white b-a-0">
									<i class="ti-search"></i>
								</button>
							</form>

						</div>
					</div>
				</nav>
			</div>
			<?php include ('customer.js.php'); ?>
