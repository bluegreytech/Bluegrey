<?php
    session_start();
    include('connection.php');
    $FROMNAME=FROMNAME;
    $USERNAME=USERNAME;
    $USERPASSWORD=USERPASSWORD;
    $SETFROM=SETFROM;
    $SETTO=SETTO;
    if(isset($_POST['fgpass']))
    {
        $email1=$_REQUEST['email1'];
        $sql=mysql_query("SELECT * FROM tbladmin WHERE UserName='$email1'");
        $row = mysql_fetch_array($sql);
        $pass=$row['Password'];
        $email1=$row['email1'];
        require_once('email/class.phpmailer.php');
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->FromName=FROMNAME; 
        $mail->Username=USERNAME;
        $mail->Password=USERPASSWORD;
        $mail->SetFrom=SETFROM;
        $mail->Subject = "BlueGrey Password for User Name";
        $mail->Body = "Hello, <br/><br/>
        Your Password for User Name $email1 of BlueGrey account is $pass<br/><br/>
        Thank You,<br/>
        <b>BlueGrey Team </b><br/>";
        $mail->AddAddress($email1);
        if(!$mail->Send())
        {
        
            ?>       
        <script>
                    $("#mail_wrong").css({ display: "block" })
                        setTimeout(function() {
                        $('#mail_wrong').fadeOut('hide');
                    }, 10000);
        </script>
        <?php
        }
        else
        {
        ?>
                    <script>
                    $("#check_mail").css({ display: "block" })
                        setTimeout(function() {
                        $('#check_mail').fadeOut('hide');
                    }, 10000);
                    </script>						
        <?php
        }
}
?>


<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  
<!-- Mirrored from pixinvent.com/free-bootstrap-template/robust-lite/html/ltr/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Apr 2019 06:04:43 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Blue Grey Technologies</title>
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/free-bootstrap-template/robust-lite/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.html">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="app-assets/images/logo/logo-blue.png" alt="branding logo"></div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Forgot Password</span></h6>
            </div>
            <center><div class="alert alert-danger" id="mail_wrong" style="width:90%;display:none; margin:0px 0px 10px 0px"><strong>Your User Name is not existing! </strong> 
            </div></center> 
       
        
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="post">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" required name="email1" class="form-control form-control-lg input-lg" placeholder="What's your username?">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                       
                        <br>
                        <button type="submit" name="fgpass" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
   

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/free-bootstrap-template/robust-lite/html/ltr/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Apr 2019 06:04:47 GMT -->
</html>

<script>
<?php
        if(isset($_SESSION['check']))
        {
    ?>
	var check = <?php echo $_SESSION['check'];?> 					
    <?php
            unset($_SESSION['check']);
    }
    ?>
	$(document).ready(function () {
	if(check==1) {
	$('#rec_not_matched').css('display','block');
		setTimeout(function(){
		    $('#rec_not_matched').css('display','none');
            }, 10000);
		}
	});
</script>
