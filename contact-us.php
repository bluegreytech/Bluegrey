<!DOCTYPE html>
<html lang="en-US">

<head>

<title>Contact Us - Bluegrey Technologies</title>
 <meta name="description" content="Contact Web luegrey Technologies for Websire design, Web devlopment, Mobile Devlopment, SEO, digital marketing and other service."/>
 
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
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <style>
        #contact-section{
            display: none;
        }
    </style>
</head>
<?php include 'menu.php';?>



<?php 

    include('admin/connection.php');   
            $FROMNAME=FROMNAME;
            $USERNAME=USERNAME;
            $USERPASSWORD=USERPASSWORD;
            $SETFROM=SETFROM;
            $SETTO=SETTO;
               
    if(isset($_POST['contact']))
    {
        $FirstName=$_POST['FirstName'];
        $LastName=$_POST['LastName'];
        $EmailAddress=$_POST['EmailAddress'];				
        $MobileNumber=$_POST['MobileNumber'];
        $CountryName=$_POST['CountryName'];
        $CountryId=$_POST['CountryId'];
        $IntrestedTypeId=$_POST['IntrestedTypeId'];
        $IntrestedType=$_POST['IntrestedType'];
        $DescriptionMessage=$_POST['DescriptionMessage'];
        $result=mysqli_query($con,"insert into tblinquiry(FirstName,LastName,EmailAddress,MobileNumber,CountryId,IntrestedTypeId,DescriptionMessage)values('$FirstName','$LastName','$EmailAddress','$MobileNumber','$CountryId','$IntrestedTypeId','$DescriptionMessage')");
        if($result)
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
                $mail->Subject = "Bluegrey- Contact Us Page";
                $mail->Body ="Hello, <br/><br>
                Please find below details for user visited your site.<br><br>
                <b>Email</b>: $EmailAddress<br/>
                <b>Name</b>: $FirstName $LastName<br/>
                <b>Contact Number</b>: $MobileNumber<br/>
				<b>Country</b>: $CountryName<br/>
				<b>Intrested In</b>: $IntrestedType<br/>
                <b>Message</b>: $DescriptionMessage <br/><br/>
                Kind Regards, <br/>
                Thank You,<br/>
                <b>Team Bluegreytech </b> <br/>";
             				
                $mail->AddAddress($SETTO);
                if(!$mail->Send())
                {
                    $_SESSION['check']=3;
                  
                }
                else
                {
                    $_SESSION['check']=1;
                         
                }
	    }
        else
        {
            $_SESSION['check']=2;
                   
        }   
    }
?>

  


<section class="hero hero--600" style="background-image:url(img/services/banner.jpg);">
    <div class="container">
        <div class="hero__content">
            <h1 class="title title--uppercase">
                <span class="title__preheader title__preheader--tag">Contact Us</span>
                Get In Touch</h1>
            <p class="hero__lead">Get in touch with us for your Web Design, Website Developing, Mobile Developing, SEO and IT consulting services. We would be really happy to hear from you!  </p>
        </div>
    </div>
</section> 

<section id="" class=" cemetery__title--center cemetery cemetery-about panel hide">
    <div class="container" style="opacity: 1;">
        <div class="cemetery__title cemetery__title--center">
            <h2>Contact Us</h2>
                            <p class="description">Let’s talk about your business ideas and our expert team will help you to create the software and website of your dreams. We appreciate your business and guarantee a response within 24 business hours which would include our packages and pricing. Contact us at the below mentioned numbers or fill in the form below and we’ll be in touch very soon.</p>
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
        <h2 class="enquiry_info">LEAVE US A MESSAGE</h2>
        <div class="form-wrap__flexbox form-wrap__flexbox--contact-page">
            <form id="myform2" class="form form--contact form--contact-page" method="post">
                <div class="form__box form__box--contact-page">
                    <div class="form-group">
                        <input type="text" class="form-control" name="FirstName" maxlength="100" required placeholder="First Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="LastName" maxlength="100" required placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="EmailAddress" maxlength="100" required placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="MobileNumber" maxlength="13" minlength="10" required placeholder="Work Phone" digits="">
                    </div>
                    <div class="form-group form__appearance">
                            <input type="hidden" name="CountryName" value="" id="CountryName">
                        <select class="form__select" name="CountryId" required id="CountryId">
                            <option value="">Country</option>
                            <?php
                            $select1=mysqli_query($con,"select * from tblcountry where IsActive='1'");
                            while($r1=mysqli_fetch_array($select1))
                            {
                            ?>                          
                            <option value="<?php echo $r1['CountryId'];?>"><?php echo $r1['CountryName'];?></option>					
                            <?php
                            }
                            ?>
                        </select>                  
                    </div>
                    <div class="form-group form__appearance">
                         <input type="hidden" name="IntrestedType" value="" id="IntrestedType">
                        <select class="form__select" name="IntrestedTypeId" required id="IntrestedTypeId">
                            <option value="">I am interested in</option>
                            <?php
                            $select1=mysqli_query($con,"select * from tblintrestedtype where IsActive='1'");
                            while($r1=mysqli_fetch_array($select1))
                            {
                            ?>                             
                            <option value="<?php echo $r1['IntrestedTypeId'];?>"><?php echo $r1['IntrestedType'];?>                      </option>					
                            <?php
                            }
                            ?>
                            </select>                    
                        </div>
                    <div class="form-group">
                        <textarea class="form__textarea" name="DescriptionMessage" placeholder="Message" required></textarea>
                    </div>
                   
                    <div class="form__footer" style="display: none;">
                        <div class="form-group upload-wrapper js-emptyFiles form-choose-file">
                            <input type="file" id="attach" name="attach"
                                   data-label="Attach file">
                        </div>

                    </div>
                   
                    <center><div class="g-recaptcha" data-sitekey="6LcB7GwUAAAAANhKfwLhOdOZMPPHefh8F_tQyczz"></div><br /></center>
                    <button class="form__submit form__submit--contact form__submit--contact-page" name="contact" type="submit">Talk to our team</button>
                   
                   
                </div>
            </form>

            <div class="contact_new_address">
                <div class="address-bar">
                    <div class="heading_add">
                        <div class="head_contnt">
                            <i class="icofont-location-pin"></i>
                            <h2>USA Office</h2>
                        </div>
                    </div>
                    <div class="row">                    
                    <div class="address_connect  col-sm-12">
                    <h4>Queen City Dr,<br> Charlotte, NC 28273</h4>
                    <h4><a href="tel:+1 (704)-457-7000">+1 (704)-457-7000</a></h4>
                    <h4><a href="mailto:info@bluegreytech.com">info@bluegreytech.com</a></h4>
                    </div>
                    <div class=" col-sm-12">
                     <!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118111.00365906462!2d73.0977960998499!3d22.317017261376908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc616b36a4a4d%3A0x7f9ebea5908e21c2!2sNilay+Infotech+Private+Limited!5e0!3m2!1sen!2sin!4v1530274737907" width="100%" height="200" frameborder="0" style="border: 0" allowfullscreen=""></iframe-->
                    </div>
                    </div>

                   
                </div>
                <div class="address-bar">
                    <div class="heading_add">
                        <div class="head_contnt">
                            <i class="icofont-location-pin"></i>
                            <h2>CANADA Office</h2>
                        </div>
                    </div>
                    <div class="row">                    
                    <div class="address_connect  col-sm-12">
                    <h4>5925 Airport Road, Suite 200,<br> Mississauga, Ontario L4V  1W1</h4>
                    <h4><a href="tel:+1 (647)-947-3371">+1 (647)-947-3371</a></h4>
                    <h4><a href="mailto:info@bluegreytech.com">info@bluegreytech.com</a></h4>
                    </div>
                    <div class=" col-sm-12">
                     <!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118111.00365906462!2d73.0977960998499!3d22.317017261376908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc616b36a4a4d%3A0x7f9ebea5908e21c2!2sNilay+Infotech+Private+Limited!5e0!3m2!1sen!2sin!4v1530274737907" width="100%" height="200" frameborder="0" style="border: 0" allowfullscreen=""></iframe-->
                    </div>
                    </div>

                   
                </div>
                <div class="address-bar">
                    <div class="heading_add">
                        <div class="head_contnt">
                            <i class="icofont-location-pin"></i>
                            <h2>India Office</h2>
                        </div>
                    </div>
                    <div class="row">                    
                    <div class="address_connect  col-sm-12">
                    <h4>408, Atlantis, Above Jasmin Mobile,<br> Near Genda Circle, Subhanpura,<br> Vadodara, Gujarat  390007</h4>
                    <h4><a href="tel:+91 81608 38603">+91 81608 38603</a></h4>
                    <h4><a href="mailto:info@bluegreytech.com">info@bluegreytech.com</a></h4>
                    </div>
                    <div class=" col-sm-12">
                     <!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118111.00365906462!2d73.0977960998499!3d22.317017261376908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc616b36a4a4d%3A0x7f9ebea5908e21c2!2sNilay+Infotech+Private+Limited!5e0!3m2!1sen!2sin!4v1530274737907" width="100%" height="200" frameborder="0" style="border: 0" allowfullscreen=""></iframe-->
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
    $('#CountryId').change(function(){ 
    var id = $(this).val();
    var cuntrytext = $('option:selected', this).text();
    $('#CountryName').val(cuntrytext);
   // alert(text);
});
$('#IntrestedTypeId').change(function(){ 
    var id = $(this).val();
    var intresttypetext = $('option:selected', this).text();
    $('#IntrestedType').val(intresttypetext);
   // alert(text);
});

</script>