<?php require_once('connection/connection.php');
include("language.php");
	$sql = "SELECT * FROM setting where setting_id='1'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) 
	{
		$setting_id=$row['setting_id'];
		$setting_name=$row['setting_name'];
		$setting_logo=$row['setting_logo'];
		$setting_address=$row['setting_address'];
		$setting_city=$row['setting_city'];
		$setting_country=$row['setting_country'];
		$setting_phone=$row['setting_phone'];
		$setting_fax=$row['setting_fax'];
		$setting_web=$row['setting_web'];
		$setting_currency=$row['setting_currency'];
	}
?>
<?php
$cookie_username ="cookie_username";
$cookie_password ="cookie_password";
if(!isset($_COOKIE[$cookie_username])) { ?>

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
		<title><?php if(isset($setting_name1)){ echo $setting_name1;}?></title>

		<!-- adaptinventory CSS -->
		<link rel="stylesheet" href="adaptinventory/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="adaptinventory/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="adaptinventory/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="adaptinventory/nprogress/nprogress.css">
        <link rel="stylesheet" href="adaptinventory/toastr/toastr.min.css">
		 <link rel="icon" href="admin/img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>" alt="<?php if(isset($setting_name1)){ echo $setting_name1;}?>" type="image/gif" sizes="16x16">
		<!-- Neptune CSS -->
		<link rel="stylesheet" href="admin/css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style="background-color:#fff;">		
		<div class="container-fluid">
			<div class="sign-form">
				<div class="row">
					<div class="col-md-4 offset-md-4 px-3">
						<div class="box b-a-0">
                        <div id="error"></div>
							<div class="p-2 text-xs-center">
								<img width="150" height="150" src="admin/img/logo/<?php if(isset($setting_logo)) echo $setting_logo;?>" alt="<?php if(isset($setting_name1)){ echo $setting_name1;}?>" title="<?php if(isset($setting_name1)){ echo $setting_name1;}?>" >
                                <!--<h5><?php if(isset($setting_name1)){ echo $setting_name1;}?></h5>-->
							</div>
							<form class="form-material mb-1" id="basicForm">
								<div class="form-group">
									<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_COOKIE["cookie_username"])) { echo $_COOKIE["cookie_username"]; } ?>" autocomplete="off" placeholder="User Name">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" value="<?php if(isset($_COOKIE["cookie_password"])) { echo $_COOKIE["cookie_password"]; } ?>" id="password" name="password" autocomplete="off" placeholder="Password"><br>
<p><input type="checkbox" name="remember" /> Remember me
	</p>
								</div>
								<div class="px-2 form-group mb-0">
									<button type="submit" class="btn btn-purple btn-block text-uppercase" name="btn-submit" id="btn-submit">Sign in</button>
								</div>
							</form>					
							
						</div>
					</div>
				</div>
			</div>
		</div>
            
		
		<!-- adaptinventory JS -->
		<script type="text/javascript" src="adaptinventory/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="adaptinventory/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="adaptinventory/bootstrap4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="adaptinventory/toastr/toastr.min.js"></script>
         <script type="text/javascript" src="adaptinventory/nprogress/nprogress.js"></script>
        <script src="admin/js/jquery.validate.min.js"></script>
        <script>
jQuery(document).ready(function(){
    
  
  // Basic Form
  jQuery("#basicForm").validate({
   /* highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    },*/
	
	
	rules:
   {
		username: {
		  required: true,
		minlength: 4
		},
		 password: {
		required: true,
		minlength: 6,
		maxlength: 15
		 }
   },
	submitHandler: submitForm
  });
  
  
   function submitForm()
    {
        var data = $("#basicForm").serialize();

        $.ajax({
        
            type : 'POST',
            url  : 'admin/login.php',
            data : data,
		    dataType : 'json',
		    
		    beforeSend: function()
            {
                NProgress.start();
                $("#error").fadeOut();
                $("#btn-submit").html(' <img src="admin/img/loader1.gif" /> &nbsp; sending ...');
            },
            success :  function (data)
            {					
		        //alert(data.status1);
                if(data.status==='error'){

                    $("#error").fadeIn(1000, function(){
                        $("#error").html('<div class="alert alert-danger"> &nbsp; Sorry wrong credentials!</div>');

                        $("#btn-submit").html(' &nbsp; Try Again');
						$("#basicForm").trigger('reset');
                    });
                }
                else if(data.status==='login')
                {
                    toastr.options = {
					positionClass: 'toast-top-right'
					};
					toastr.success('Success!');
					NProgress.done();
                    
				    $("#btn-submit").html('<img src="admin/img/loader1.gif" /> &nbsp; Signing in ...');
				    setTimeout('$(".sign-form").fadeOut(500, function(){ window.location = "admin/index.php" }); ',2000);
         			//window.location = 'admin/index.php';	
				
       
                  }
               
            }
        });
        return false;
    }
  
  
    
});



</script> 
 
        
        
	</body>

</html>
    


<?php

} else {
    session_start();

//require_once ('../connection/connection.php');
$response = array();






if(!empty($_COOKIE[$cookie_username]) && !empty($_COOKIE[$cookie_password]))
{
  
	$username      = strip_tags(trim($_COOKIE[$cookie_username]));

    $password     = md5(trim($_COOKIE[$cookie_password]));
	// $cookie_password     = trim($_POST['password']);    
	$q="SELECT * FROM auth WHERE auth_username='$username' and auth_password='$password'";	
     $result = $conn->query($q);
        if($result->num_rows > 0){
			while($row1=$result->fetch_assoc()) {	
		 
				$auth_id=$row1['auth_id'];
				$_SESSION['auth_id']=$auth_id;
				$auth_username=$row1['auth_username'];
				$_SESSION['auth_username']=$auth_username;
				$full_name=$row1['full_name'];
				$_SESSION['full_name']=$full_name;
				$user_type_id=$row1['user_type_id'];
				$_SESSION['user_type_id']=$user_type_id;
				
			
				
				
				
				
							
			  header("location:admin/index.php");
			}		
		
		}else{
            
			$response['status'] = 'error';
        }

  
}


}



?>
