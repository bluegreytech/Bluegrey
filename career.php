<!DOCTYPE html>
<html lang="en-US">

<head>

<title>Career - Bluegrey Technologies</title>
 <meta name="description" content=""/>
 
 <link rel="canonical" href="">  
	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#0072f6">
	<link rel="icon" type="image/png" href="img/favicon/favicon.ico">
	
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png">

    <!--favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="">
    <!--CSS-->
    <link href="css/icons.css" rel="stylesheet" position="3">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:100,300,400,600" rel="stylesheet" position="3">
    <link href="css/owl.carousel.min8d54.css?v=1551100772" rel="stylesheet">
    <link href="css/swiper.min8d54.css?v=1551100772" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/main-style.min.css" rel="stylesheet">
    <link href="css/icofont.min.css" rel="stylesheet">
    

</head>
<?php include 'menu.php';?>


<?php 
    $FROMNAME=FROMNAME;
    $USERNAME=USERNAME;
    $USERPASSWORD=USERPASSWORD;
    $SETFROM=SETFROM;
    $SETTO=SETTO;
    if(isset($_POST['carrersave']))
    {
        $UserName=$_POST['UserName'];
        $EmailAddress=$_POST['EmailAddress'];
        $MobileNumber=$_POST['MobileNumber'];
        $JobPostId=$_POST['JobPostId'];
        $JobTitle=$_POST['JobPostId'];
        $folder = "admin/Resume/";
        $UserResume = $_FILES["UserResume"]["name"];
        $resume_path ="$folder/$UserResume";
        $RemarkMessage=$_POST['RemarkMessage'];
        $resume_type = array(
                    '.doc'=>'application/msword',
                    '.docx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    '.pdf'=>'application/pdf'); 
                    
                    
            if ( is_uploaded_file( $_FILES['UserResume']['tmp_name'] ) )
            {
                if($key = array_search($_FILES['UserResume']['type'],$resume_type))
                {
                    if (move_uploaded_file($_FILES['UserResume']['tmp_name'],"$folder".$UserResume))
                    {
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
                                $mail->Subject = "Bluegrey-Career";
                                $mail->Body ="Hello, <br/><br>
                                Please find below details for user visited your site.<br><br>
                                <b>Email Address</b>: $EmailAddress<br/>
                                <b>Name</b>: $UserName <br/>
                                <b>Contact Number</b>: $MobileNumber<br/>
                                <b>Applied Position For</b>:  $JobTitle<br/>
                                <b>Resume</b>: $UserResume<br/>
                                <b>Remarks</b>: $RemarkMessage <br/><br/>
                                Kind Regards, <br/>
                                Thank You,<br/>
                                <b>Team Bluegrey</b> <br/>";
                                $mail->AddAddress($SETTO);
                            
                                $mail->AddAttachment($folder.$UserResume);
                             
                                if(!$mail->Send())
                                {
                                    $_SESSION['check']=3;
                                   
                                }
                                else
                                {
                                    include('admin/connection.php');
                               
                                    $result=mysqli_query($con,"INSERT INTO tblcareer(UserName,EmailAddress,MobileNumber,Position,UserResume,RemarkMessage)VALUES('$UserName','$EmailAddress','$MobileNumber','$Position','$UserResume','$RemarkMessage')")or die(mysql_error());
                                    if($result)
                                    { 
                                        $_SESSION['check']=1; 
                                       
                                    }
                                    else    
                                    {
                                        $_SESSION['check']=2;
                                                              
                                    }
                                          
                                }
                  
                      
                            
                    }
                }
            }
           


    }
  




       
?>
        
                     
<section class="hero hero--600" style="background-image:url(img/services/banner.jpg);">

    <div class="container">
        <div class="hero__content">
            <h1 class="title title--uppercase">
                <span class="title__preheader title__preheader--tag">Company</span>
                About Bluegrey Technologies </h1>
            <p class="hero__lead">Bluegrey Technologies is a one-stop web development and IT services and solutions company. With an experience of over 10 years in the IT industry and having worked with over 800+ clients, we have consistently established ourselves as the providers of the most innovative, eye catchy and comprehensive web solutions to global businesses across various industries. In a constantly evolving world of dynamic technology, we believe in delivering the best quality services and provide 24/7 support to all our clients to ensure they never have to worry about their IT needs again. </p>
        </div>
    </div>
</section> 

<section id="" class=" cemetery__title--center cemetery cemetery-about panel hide">
    <div class="container" style="opacity: 1;">
        <div class="cemetery__title cemetery__title--center">
            <h2>Career</h2>
                            <p class="description">We’re always happy to hear from potential prospects, existing clients, partners, competitors – pretty much anybody. We’ll tell you very quickly if we can help solve your situation and hear you out if you can help solve ours. If you have an interesting project or an idea, big or small, or would like to simply pick our brain and talk business, Contact Us at the below mentioned numbers or fill in the form below and we’ll be in touch very soon.</p>
                    </div>
        <div id="cemetery" class="owl-carousel owl-theme owl-loaded owl-drag"></div>
    </div>
</section>

<section class="form-wrap form-wrap--contact-page">
    <div class="container">
        <center>
            <div class="alert alert-danger" id="email_error" style="display: none;"><strong>Your record was not inserted. </strong> 
            </div>
        </center> 
        <center><div class="alert alert-success" id="insert_rec" style="display: none;">
                    <strong>Thank you for your note. We will contact you within 3 business days.</strong>
                </div>    
        </center>
        <center><div class="alert alert-danger" id="rec_not_inserted" style="display: none;"><strong>Your record was not inserted. </strong> 
        </div>
        </center>
        <h2 class="enquiry_info">Current Openings</h2>
        <div class="form-wrap__flexbox form-wrap__flexbox--contact-page">
            

            <div class="contact_new_address capabilities">
                <div class="capabilities-block">
                <div class="developers">

                <!--Item1-->
                    <?php
                        include('admin/connection.php');
                        $row=mysqli_query($con,"SELECT * from tbljobpost where IsActive='1' ORDER BY JobPostId DESC");
                        while($r1=mysqli_fetch_array($row))
                        {
                    ?>
                    <div class="dev-description">
                        <div class="dev-title">  
                            <div class="icon-dev">
                                <img src="img/file.png">
                            </div>
                            <h3><?php echo $r1['JobTitle'];?></h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7">
                                <path fill="none" fill-rule="evenodd" stroke="#323232" d="M11 1L5.5 6 0 1" opacity=".6"></path>
                            </svg>
                        </div>
                        <ul class="technologies">
                            <p><?php echo $r1['JobDescription'];?></p>
                            <a class="ctn-btn" href="#jobform">Apply</a>
                        </ul>
                        
                    </div>
                    <?php
                    }
                    ?><div id="jobform" class="overlay" data-backdrop="static" data-keyboard="false">
                                <div class="popup">
                                    <div class="popup-title">
                                    <h2>Apply Form</h2>
                                    <a class="close" href="#">&times;</a>
                                    </div>

                                    
                                    <div class="content">
                                       
                                        <form id="myform2" class="form form--contact form--contact-page" method="post" enctype="multipart/form-data" style="width: 100%;padding-right:0;">
                                        <div class="form__box form__box--contact-page">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="UserName" maxlength="100" placeholder="Your Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="EmailAddress" maxlength="100" required placeholder="Email Address" email="">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="MobileNumber" maxlength="13" minlength="10" required placeholder="Work Phone" digits="">
                                            </div>
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control" value="<?php //echo $r1['JobTitle'];?>" name="Position" maxlength="100" placeholder="Position Applied" required readonly> -->
                                                <select class="form__select" name="JobPostId" required>
                                                <option value="">I am interested in</option>
                                                <?php
                                                $select1=mysqli_query($con,"select * from tbljobpost where IsActive='1'");
                                                while($r1=mysqli_fetch_array($select1))
                                                {
                                                ?>
                                                <option value="<?php echo $r1['JobTitle'];?>"><?php echo $r1['JobTitle'];?></option>					
                                                <?php
                                                }
                                                ?>
                                                </select>     
                                            </div>
                                            <div class="form-group" required>
                                                <textarea class="form__textarea" name="RemarkMessage" maxlength="2000" placeholder="Remark Message"></textarea>
                                            </div>
                                            <div class="form__footer">
                                                <div class="form-group">
                                                    <label class=" form__checkbox-label--gray" for="send_nda">
                                                       Upload Your CV                        
                                                    </label>
                                                </div>
                                                <div class="form-group upload-wrapper js-emptyFiles form-choose-file">
                                                    <input type="file" id="attach" name="UserResume"
                                                           data-label="Attach file" required>
                                                    <button class="clear-attach">x</button>
                                                    <label class="uploaded__label upload__label" for="attach">
                                                        <span class="uploaded__text">
                                                            <i class="isoi-paper-clip"></i>Attach file      
                                                        </span>
                                                    </label>
                                                </div>

                                            </div><br>
                                            
                                             <button class="form__submit form__submit--contact form__submit--contact-page " name="carrersave" type="submit">Submit</button>
                                          
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>   
                <!--Item1 finish-->
                
                </div>
                
                </div>
            </div>
                 
            </div>

            

        </div>
    </div>
</section>


<?php include 'footer.php';?>

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
    $('#jobform').css('display','none');
    $('#insert_rec').css('display','block');
        setTimeout(function(){
            $('#insert_rec').css('display','none');
            }, 10000);
        }
    });

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
    if(check==2) {
    $('#rec_not_inserted').css('display','block');
        setTimeout(function(){
            $('#rec_not_inserted').css('display','none');
            }, 10000);
        }
    });

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
    if(check==3) {
    $('#email_error').css('display','block');
        setTimeout(function(){
            $('#email_error').css('display','none');
            }, 10000);
        }
    });
</script>