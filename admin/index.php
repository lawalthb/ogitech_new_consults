<?php session_start();
if($_SESSION['user_type_id']==2 ) { header("Location: index2.php"); die();}

if(empty($_SESSION['auth_username'])) { header("Location: ../index.php");}
require_once ('../connection/connection.php');
include("dashboard-queries.php"); 
include("language.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

		<!-- Meta tags -->
		<meta charset="utf-8">
        
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title><?php echo $lang['Dashboard'];?></title>

		<!-- adaptinventory CSS -->
		<link rel="stylesheet" href="../adaptinventory/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="../adaptinventory/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../adaptinventory/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../adaptinventory/animate.css/animate.min.css">
		<link rel="stylesheet" href="../adaptinventory/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="../adaptinventory/waves/waves.min.css">
		<link rel="stylesheet" href="../adaptinventory/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="../adaptinventory/morris/morris.css">
		

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">
		 <link rel="icon" href="img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>" type="image/gif" sizes="16x16">
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="fixed-sidebar fixed-header skin-3 content-appear" >
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>

			<!-- Sidebar -->
			<div class="site-overlay"></div>
			
			<?php include("sidebar.php");?>
			<!-- Sidebar second -->
			<?php include("rightsidebar.php");?>

			<!-- Template options -->
			<?php include("template-options-menu.php");?>

			<!-- Header -->
			<?php include("headermenu.php");?>

<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
setInterval(function(){
$("#site-content").load('dash.php')
}, 2000);
});
</script>
			<div class="site-content" id="site-content">
				
							
						</div>
						
                       
                        
					</div>
				</div>
				<!-- Footer -->
				<?php include("footermenu.php");?>
           
			</div>

		</div>

		<!-- adaptinventory JS -->
		<script type="text/javascript" src="../adaptinventory/jquery/jquery-1.12.3.min.js"></script>
        <script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="../adaptinventory/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="../adaptinventory/jscrollpane/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="../adaptinventory/jscrollpane/mwheelIntent.js"></script>
		<script type="text/javascript" src="../adaptinventory/jscrollpane/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
		<script type="text/javascript" src="../adaptinventory/waves/waves.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/switchery/dist/switchery.min.js"></script>		
        <script type="text/javascript" src="../adaptinventory/raphael/raphael.min.js"></script>
		<script type="text/javascript" src="../adaptinventory/morris/morris.min.js"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>        
        <link rel="stylesheet" href="css/jquery-ui.css">
         <?php include ('invoice.js.php'); ?>
        <script type="text/javascript">
		


/* =================================================================
    Donut chart
================================================================= */

Morris.Donut({
    element: 'donut',
    data: [{
        label: "<?php echo $lang['TotalReceivable'];?> %",
        value: <?php if(isset($receivableper)){echo $receivableper;}?>,

    }, {
        label: "<?php echo $lang['TotalDiscountGiven'];?> %",
        value: <?php if(isset($total_discountper)){echo $total_discountper;}?>
    }, {
        label: "<?php echo $lang['TotalReceivedAmount'];?> %",
        value: <?php if(isset($paid_amountper)){echo $paid_amountper;}?>
    }
	],
    resize: true,
    colors:['#f44236', '#f59345', '#43b968']
});


</script>
	</body>

</html>