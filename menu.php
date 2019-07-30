<?php
     include('admin/connection.php');   
     if(isset($_POST['quote']))
     {
        $UserName=$_POST['UserName'];
        $EmailAddress=$_POST['EmailAddress'];
        $QueryTypeId=$_POST['QueryTypeId'];
        $QueryType=$_POST['QueryType'];
        $MessageQuery=$_POST['MessageQuery'];
        $result=mysqli_query($con,"insert into tblquote(UserName,EmailAddress,QueryTypeId,MessageQuery)values('$UserName','$EmailAddress','$QueryTypeId','$MessageQuery')")or die(mysql_error());
        if($result)
        {
                $FROMNAME=FROMNAME;
                $USERNAME=USERNAME;
                $USERPASSWORD=USERPASSWORD;
                $SETFROM=SETFROM;
                $SETTO=SETTO;
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
                $mail->Subject = "Bluegrey- Free Quote";
                $mail->Body ="Hello, <br/><br>
                Please find below details for user visited your site.<br><br>
                <b>Email</b>: $EmailAddress<br/>
                <b>Name</b>: $UserName <br/>
                <b>Query Type</b>: $QueryType<br/>
                <b>Message</b>: $MessageQuery <br/><br/>
                Kind Regards, <br/>
                Thank You,<br/>
                <b>Team Bluegreytech</b> <br/>";
                $mail->AddAddress($SETTO);
                
                if(!$mail->Send())
                {
                    $_SESSION['check']=3;
                    // echo '<script>
                            // window.location="contact-us"
                            // </script>';
                }
                else
                {
                    $_SESSION['check']=1;
							// echo '<script>
                            // window.location="contact-us"
                            // </script>';
                }
	    }
        else
        {
            $_SESSION['check']=2;
                    // echo '<script>
                    // window.location="contact-us"
                    // </script>';
        }	
     }
?> 	

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141149672-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141149672-1');
  
  
</script>


<style type="text/css">
    jdiv.chatCopyright_3s.__chat_35,jdiv.copy_2W{
        display: none;
    }
</style>
<script src="//code.jivosite.com/widget.js" jv-id="CWvF23cdDh" async></script>
<!--Start of Tawk.to Script-->
<!--script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cefe1a4267b2e5785302d24/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script-->
<!--End of Tawk.to Script--> 	

<link href="css/montserrat.css" rel="stylesheet">

<body class="pages-index">
    <!--div class="preload">
        <span class="blink">
        <img src="img/logo-blue.png">
        </span>
    </div-->


    <!-- Sliding div starts here -->
<div class="sidebar-contact">
    <img src="img/call.png" class="toggle">
    <h2>Contact Us</h2>
    <div class="scroll">
    <form id="myform" class="form form--contact form--contact-page" method="post" style="width: 100%;padding-right:0;">
                                        <div class="form__box form__box--contact-page">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="UserName" maxlength="255" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group">
                                                 <input type="email" class="form-control" name="EmailAddress" maxlength="100" required placeholder="Email Address">
                                            </div>
                                            <div class="form-group form__appearance">
                                                    <input type="hidden" name="QueryType" value="" id="QueryType">
                                                <select class="form__select" name="QueryTypeId" required id="QueryTypeId">
												<option value="">Select Query Type</option>
                                                 <?php
												$select1=mysqli_query($con,"select * from tblquerytype where IsActive='1'");
												while($r1=mysqli_fetch_array($select1))
												{
												?>
													<option value="<?php echo $r1['QueryTypeId'];?>"><?php echo $r1['QueryType'];?></option>                    
												<?php
												}
												?>
                                                </select>                   
                                            </div>
                                           <div class="form-group" required>
                                                <textarea class="form__textarea" name="MessageQuery" maxlength="65535" required placeholder="Message"></textarea>
                                            </div>

                                             <button class="form__submit form__submit--contact form__submit--contact-page" name="quote" type="submit">Talk to our team</button>
                                          
                                        </div>
                                    </form>
    </div>
  </div>
<!-- Sliding div ends here -->

<div id="o-wrapper" class="wrapper overflow-hidden">

	<nav class="nav ">
		<div class="container">
			<div class="nav__logo">
				<a class="logo logo-white" href="index"></a>
            </div>
	<div class="nav__wrapper">
				
    <ul class="nav__list">
        <li class="menu-item">
                <a href="index" class="menu-item-link">Home</a>
            </li>
            <li class="menu-item has-dropdown">
                <a href="#" class="menu-item-link">What We Do</a>
                <div class="sub-menu-wrapper">
                    <div class="sub-menu-container">
                        <div class="article-container">
                            <div class="article__item">
                                <div class="article__content">
                                    <a href="#" class="article__link">
                                        <img src="img/menu-contents/1.jpg"
                                             alt="Clients" class="article__img">
                                        <p class="article__description"></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="sub-menu-list-container">
                            <ul class="sub-menu">
                                <div class="sub-menu__wrapper">
                                    <div class="sub-menu__header"></div>
                                     <li class="menu-item">
                                            <!--a href="#" class="sub-item-link">
                                               Web Solutions <i class="isoi-angle-right "></i>
                                            </a-->
                                            <a data-image="img/menu-contents/web-solve.jpg"  class="sub-item-link">
                                                            Web Solutions<i class="isoi-angle-right "></i>
                                            </a>
                                            <div class="sub-menu__list-wrapper">
                                                    <ul class="sub-menu__list">
                                                        <li class="sub-menu__list-item">
                                                            <a href="web-development" class="sub-item-link sub-item-link--list">Web Development</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="web-design" class="sub-item-link sub-item-link--list">Web Design</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="digital-marketing" class="sub-item-link sub-item-link--list">Digital Marketing</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="mobile-application" class="sub-item-link sub-item-link--list">Mobile Application</a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </li>
                                </div>
                                <div class="sub-menu__wrapper">
                                     <li class="menu-item">
                                            <a data-image="img/menu-contents/it-serve.jpg"  class="sub-item-link">
                                                           IT Services<i class="isoi-angle-right "></i>
                                            </a>
                                            <div class="sub-menu__list-wrapper">
                                                    <ul class="sub-menu__list">
                                                        <li class="sub-menu__list-item">
                                                            <a href="msp-services" class="sub-item-link sub-item-link--list">MSP Services</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="workstations-and-point-of-sale-systems" class="sub-item-link sub-item-link--list">Workstation & POS Systems</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="employee-productivity" class="sub-item-link sub-item-link--list">Employee Productivity</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="security-and-monitoring" class="sub-item-link sub-item-link--list">Security & Monitoring</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="network-infrastructure" class="sub-item-link sub-item-link--list">Network Infrastructure</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="data-protection-and-migration" class="sub-item-link sub-item-link--list">Data Protection & Migration</a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </li>
                                </div>
                                <div class="sub-menu__wrapper">
                                     <li class="menu-item">
                                            <a data-image="img/menu-contents/call-center.jpg"  class="sub-item-link">
                                                            Call Center Services<i class="isoi-angle-right "></i>
                                            </a>
                                            <div class="sub-menu__list-wrapper">
                                                    <ul class="sub-menu__list">
                                                        <li class="sub-menu__list-item">
                                                            <a href="inbound-call-center-services" class="sub-item-link sub-item-link--list">Inbound</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="outbound-call-center" class="sub-item-link sub-item-link--list">Outbound</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="live-chat" class="sub-item-link sub-item-link--list"> Live Chat</a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </li>
                                </div>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="menu-item">
                <a href="industries" class="menu-item-link">What We Serve</a>
            </li>
            <li class="menu-item">
                <a href="blog" class="menu-item-link">Blog</a>
            </li>
            <li class="menu-item">
                <a href="portfolio" class="menu-item-link">Portfolio</a>
            </li>
            <li class="menu-item has-dropdown">
                <a href="#" class="menu-item-link">Who We Are</a>
                <div class="sub-menu-wrapper">
                    <div class="sub-menu-container">
                        <div class="article-container">
                            <div class="article__item">
                                <div class="article__content">
                                    <a href="#" class="article__link">
                                        <img src="img/menu-contents/1.jpg"
                                             alt="Clients" class="article__img">
                                        <p class="article__description"></p>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="sub-menu-list-container">
                            <ul class="sub-menu">
                                <div class="sub-menu__wrapper">
                                        <li class="menu-item">
                                            <a href="about#heroAbout"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                About </i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about#mission"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                Our Mission </i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about#vision"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                Our Vision</i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about#wedo"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                What We Do</i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="career"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                Career</i>
                                            </a>
                                        </li>

                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            
            </ul>			
            </div>
			<div class="nav__btn">
				<a class="get-touch btn" href="contact-us">Contact Us</a><a id="c-button--push-left" href="#" class="sandwich menu-btn"></a>
			</div>
		</div>
	</nav>
    <script src="js/jquery.min6b47.js?v=1463765083"></script>
<script>
$('#QueryTypeId').change(function(){ 
    var id = $(this).val();
    var querytypetext = $('option:selected', this).text();
    $('#QueryType').val(querytypetext);
});
</script>