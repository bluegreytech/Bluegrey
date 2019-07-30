<?php 
    //include('admin/connection.php');
    
   
    if(isset($_POST['footersave']))
    {
        $FirstName=$_POST['FirstName'];
        $LastName=$_POST['LastName'];
        $EmailAddress=$_POST['EmailAddress'];
        $MobileNumber=$_POST['MobileNumber'];
        $CountryId=$_POST['CountryId'];
        $IntrestedTypeId=$_POST['IntrestedTypeId'];
        $DescriptionMessage=$_POST['DescriptionMessage'];
        $result=mysql_query("insert into tblinquiry(FirstName,LastName,EmailAddress,MobileNumber,CountryId,IntrestedTypeId,DescriptionMessage)values('$FirstName','$LastName','$EmailAddress','$MobileNumber','$CountryId','$IntrestedTypeId','$DescriptionMessage')")or die(mysql_error());
        if($result)
        {   
						// $_SESSION['check']=1;
                            // echo '<script>
                            // window.location="footer.php"
                            // </script>';
							
                //$FROMNAME=FROMNAME;
                //$USERNAME=USERNAME;
                //$USERPASSWORD=USERPASSWORD;
                //$SETFROM=SETFROM;
                //$SETTO=SETTO;
                require_once('email/class.phpmailer.php');
                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->FromName="Bluegrey"; 
                $mail->Username = "hiren@nilayinfotech.co.in";
                $mail->Password = "Hiren@1234";
                $mail->SetFrom("hiren@nilayinfotech.co.in");
                $mail->Subject = "Bluegrey- Contact Us- Footer";
                $mail->Body ="Hello, <br/><br>
                Please find below details for user visited your site.<br><br>
                <b>Email Address</b>: $EmailAddress<br/>
                <b>Name</b>: $FirstName $LastName<br/>
                <b>Contact Number</b>: $MobileNumber<br/>
				<b>Country</b>: $CountryId<br/>
				<b>Intrested In</b>: $IntrestedTypeId<br/>
                <b>Message</b>: $DescriptionMessage <br/><br/>
                Kind Regards, <br/>
                Thank You,<br/>
                <b>Team Bluegreytech </b> <br/>";
                $mail->AddAddress("hiren@nilayinfotech.co.in");
                
                if(!$mail->Send())
                {
                    $_SESSION['check']=3;
                    // echo '<script>
                            // window.location="index.php"
                            // </script>';
                }
                else
                {
                    $_SESSION['check']=1;
                            // echo '<script>
                            // window.location="index.php"
                            // </script>';
                }
        }
        else
        {
            $_SESSION['check']=2;
                    // echo '<script>
                    // window.location="index.php"
                    // </script>';
        }       
    }
?>

<section id="contact-section" class="form-wrap form-wrap--contact section">
    <div class="container">
        <div class="contact-section">
            <div class="contact-about-wrap">
                <h2 class="contact-about-header">Tell us about your project</h2>
                <div class="contact-about-stats">
                    <div class="stat-item">
                        <div class="stat-num">10</div>
                        <span class="stat-desc">Years in operation</span>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">800+</div>
                        <span class="stat-desc">Loyal Clients</span>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">3</div>
                        <span class="stat-desc">Offices globally</span>
                    </div>
                </div>
                <div class="ranking-form">
    <h3 class="ranking-form__title">Awards & Recognition</h3>
    <div class="owl-carousel" id="formRanking">
        <div class="ranking-form__item item">
            <img class="owl-lazy" data-src="img/form-ratings/itfirms.png" alt="IT Firms Award">
        </div>
        <div class="ranking-form__item item">
            <img class="owl-lazy" data-src="img/form-ratings/top-design.png" alt="TOP design firms Award">
        </div>
        <div class="ranking-form__item item">
            <img class="owl-lazy" data-src="img/form-ratings/goodfirms.png" alt="Good firms Award">
        </div>
        
    </div>
</div>            </div>
            <div  class="form-wrap__flexbox" id="form-wrap">
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
                <form id="myform1" class="form form--contact form--contact-page" method="post" style="width: 100%;padding-right:0;">
                    <div class="form__box" data-style="display: flex;">
                        <div class="form-group">
                            <input type="text" class="form-control" name="FirstName" maxlength="100"
                                   placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="LastName" maxlength="100"
                                   placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" name="EmailAddress" maxlength="100" required placeholder="Email Address" email="">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="MobileNumber" maxlength="13" minlength="10" required placeholder="Work Phone" digits="">
                    </div>
                   
                    <div class="form-group form__appearance">
                        <select class="form__select" name="CountryId" required>
                            <option value="">Country</option>
                            <?php
                            $select1=mysql_query("select * from tblcountry where IsActive='1'");
                            while($r1=mysql_fetch_array($select1))
                            {
                            ?>
                            <option value="<?php echo $r1['CountryName'];?>"><?php echo $r1['CountryName'];?></option>                    
                            <?php
                            }
                            ?>
                        </select>                    
                    </div>

                    <div class="form-group form__appearance">
                        <select class="form__select" name="IntrestedTypeId" required>
                            <option value="">I am interested in</option>
                            <?php
                            $select1=mysql_query("select * from tblintrestedtype where IsActive='1'");
                            while($r1=mysql_fetch_array($select1))
                            {
                            ?>
							<option value="<?php echo $r1['IntrestedType'];?>"><?php echo $r1['IntrestedType'];?></option>
                            <?php
                            }
                            ?>
                        </select>                    
                    </div>
                   
                    <div class="form-group form-group--description">
                        <textarea class="form__textarea" name="DescriptionMessage"
                                  placeholder="Message" required></textarea>
                    </div>

                   
                   

                     <button class="form__submit form__submit--contact form__submit--contact-page" name="footersave" type="submit">Talk to our team</button>
                   
                   
                </form>
                           </div>
        </div>
    </div>
</section>

	<footer class="footer">
			<div class="footer__flexbox">
                <ul class="footer__menu"><li class="has-dropdown"><a>Web Solutions</a>
<ul class="sub-menu">
<li><a href="web-development.php">Web Development</a></li>
<li><a href="web-design.php">Web Design</a></li>
<li><a href="digital-marketing.php">Digital Marketing</a></li>
<li><a href="mobile-application.php">Mobile Application</a></li>
</ul>
</li>
<li class="has-dropdown"><a>IT Services</a>
<ul class="sub-menu">
<li><a href="msp-services.php">MSP Services</a></li>
<li><a href="workstations-and-point-of-sale-systems.php">Workstation & POS Systems</a></li>
<li><a href="employee-productivity.php">Employee Productivity</a></li>
<li><a href="security-and-monitoring.php">Security System Monitoring Service</a></li>
<li><a href="network-infrastructure.php">Network Infrastructure</a></li>
<li><a href="data-protection-and-migration.php">Data Protection & Migration</a></li>
</ul>
</li>
<li class="has-dropdown"><a>Customer Support</a>
<ul class="sub-menu">
<li><a href="inbound-call-center-services.php">Inbound</a></li>
<li><a href="outbound-call-center.php">Outbound</a></li>
<li><a href="live-chat.php">Live Chat</a></li>
</ul>
</li>
<li class="has-dropdown"><a>Company</a>
<ul class="sub-menu">
<li><a href="about.php">About Us</a></li>
<li><a href="career.php">Careers</a></li>
<li><a href="blog.php">Blog</a></li>
<li><a href="portfolio.php">Portfolio</a></li>
<li><a href="sitemap.php">Sitemap</a></li>
</ul>
</li></ul>				<div class="footer__about">
                    <div class="footer__address">
		<a class="footer__heading">Contacts</a>
		<div class="footer__office">
			
				<b> USA	<b/>		
	
			<div class="footer__address">
				Queen City Dr, Charlotte, NC 28273</div>
			<div class="footer__address">
				<b>Canada</b></div>
<div class="footer__address">
				5925 Airport Road, Suite 200, Mississauga, Ontario L4V 1W1</div>				
			<a href="contact-us.php" class="all-link footer__link">
				More contacts<i class="isoi-angle-right"></i>
			</a>
		</div>
</div>				</div>
			</div>
			<div class="footer__copyright">
                <div class="footer__copy-container">
                    <span class="footer__year">&copy; 2019 BLUEGREY TECHNOLOGIES</span>
				</div>
				<div class="footer__social social-box" style="display: none;">
    <div class="social-box__list">
		<a class="linkedin social-box__icon" href="#" rel="nofollow" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
	<path d="M2 0.3C3.1 0.3 4 1.2 4 2.3 4 3.4 3.1 4.3 2 4.3 0.9 4.3 0 3.4 0 2.3 0 1.2 0.9 0.3 2 0.3L2 0.3ZM0.3 16.9L0.3 5.8 3.7 5.8 3.7 16.9 0.3 16.9ZM5.9 5.8L9.2 5.8 9.2 7.3 9.2 7.3C9.7 6.5 10.8 5.5 12.5 5.5 16 5.5 16.6 7.8 16.6 10.8L16.6 16.9 13.2 16.9 13.2 11.5C13.2 10.2 13.1 8.6 11.4 8.6 9.6 8.6 9.3 10 9.3 11.4L9.3 16.9 5.9 16.9 5.9 5.8Z"/>
</svg></a>
		<a class="facebook social-box__icon" href="#" rel="nofollow" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18">
	<path d="M8 2.9C8.5 2.9 9 2.9 9.5 2.9L9.8 2.9 9.8 0.1C9.5 0.1 9.2 0.1 8.9 0 8.3 0 7.8 0 7.3 0 6.4 0 5.6 0.2 4.9 0.7 4.2 1.3 3.7 2.1 3.6 3 3.5 3.4 3.5 3.8 3.5 4.2 3.5 4.8 3.5 5.4 3.5 6.1L3.5 6.3 0.8 6.3 0.8 9.4 3.4 9.4 3.4 17.1 6.7 17.1 6.7 9.4 9.3 9.4C9.4 8.4 9.5 7.4 9.7 6.3 9.5 6.3 9.3 6.3 9.1 6.3 8.3 6.3 6.6 6.3 6.6 6.3 6.6 6.3 6.6 4.8 6.7 4.1 6.7 3.2 7.2 2.9 8 2.9"/>
</svg></a>
		<a class="twitter social-box__icon" href="#" rel="nofollow" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15"><path d="M5.5 11.6C3.6 11.5 2.4 10.1 2 9 2.6 9.1 3.1 9.1 3.6 8.9 3.7 8.9 3.7 8.9 3.7 8.9 2.6 8.7 1.8 8.1 1.3 7.2 0.9 6.6 0.7 5.9 0.7 5.2 1.2 5.5 1.8 5.6 2.4 5.7 1.6 5.1 1.1 4.3 0.8 3.4 0.6 2.4 0.8 1.5 1.2 0.7 3.3 3.1 5.8 4.4 8.9 4.6 8.9 4.4 8.9 4.3 8.9 4.2 8.8 3.3 9 2.5 9.4 1.7 10 0.8 10.9 0.2 12 0.1 13.2-0.1 14.3 0.2 15.2 1.1 15.3 1.2 15.3 1.2 15.4 1.2 16.2 1 16.9 0.7 17.6 0.3 17.6 0.3 17.6 0.3 17.7 0.3 17.7 0.3 17.7 0.3 17.7 0.3 17.4 1.2 16.8 1.8 16.1 2.3 16.8 2.2 17.5 2.1 18.2 1.8 18.2 1.8 18.2 1.8 18.2 1.8 18 2 17.9 2.2 17.7 2.3 17.3 2.8 16.9 3.3 16.4 3.6 16.3 3.7 16.3 3.7 16.3 3.8 16.3 4.3 16.3 4.9 16.3 5.4 16.1 6.6 15.8 7.7 15.3 8.7 14.8 9.8 14.1 10.8 13.3 11.7 11.9 13.1 10.1 14.1 8.1 14.5 7.5 14.7 6.8 14.8 6.1 14.8 3.9 14.8 1.9 14.3 0.1 13.2 0.1 13.2 0 13.2 0 13.1 1.3 13.3 2.5 13.1 3.7 12.6 4.4 12.4 5 12 5.5 11.6"/></svg></a>
		
		<a class="youtube social-box__icon" href="#" rel="nofollow" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 22" height="20"> <g transform="scale(0.04)"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></g></svg></a>    </div>
</div>			</div>
	</footer>
</div>
<nav class="nav-mobile">
	<div id="c-menu--push-left" class="c-menu c-menu--push-left is-active">
		<ul class="c-menu__items">
            <li class="menu-item">
                <a href="index.php">Home</a>
            </li>
            <li class="menu-item has-dropdown">
                <a href="#">Services</a>
                <ul class="sub-menu">
                <li class="menu-item"><a href="web-solution.php">Web Solutions</a></li>
                <li class="menu-item"><a href="it-services.php">IT Services</a></li>
                <li class="menu-item"><a href="call-center-services.php">Call Center Services</a></li>
               </ul>
            </li>
            <li class="menu-item">
                <a href="industries.php">Industry</a>
            </li>
            <li class="menu-item">
                <a href="blog.php">BLog</a>
            </li>
            <li class="menu-item">
                <a href="portfolio.php">Portfolio</a>
            </li>
            <li class="menu-item has-dropdown"><a href="#">Company</a>
            <ul class="sub-menu">
            <li class="menu-item"><a href="about.php#heroAbout">About</a></li>
            <li class="menu-item"><a href="about.php#mission">Our Mission</a></li>
            <li class="menu-item"><a href="about.php#vision">Our Vision</a></li>
            <li class="menu-item"><a href="about.php#wedo">What We Do</a></li>
            <li class="menu-item"><a href="career.php">Career</a></li>

            </ul>
            </li>
            
        </ul>	
    </div>
    <div class="nav-mobile__top">
        <a class="btn btn--menuLeft" href="contact-us.php">Contact Us</a>     <a id="closeBtn" href="#" class="btn-close"></a>
    </div>
    
</nav>
<div id="c-mask" class="c-mask"></div>

<script src="js/jquery.min6b47.js?v=1463765083"></script>
<script src="js/tr.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/promise.min8d54.js?v=1551100772"></script>
<script src="js/egg.min8d54.js?v=1551100772"></script>
<script src="js/flickity.pkgd.min.js"></script>
<script src="js/flexibility.min8d54.js?v=1551100772"></script>
<script src="js/validate.min8d54.js?v=1551100772"></script>
<script src="js/skrollr.min8d54.js?v=1551100772"></script>
<script src="js/jquery.svg3dtagcloud.min8d54.js?v=1551100772"></script>
<script src="js/advert8d54.js?v=1551100772"></script>
<script src="js/typo8d54.js?v=1551100772"></script>
<script src="js/jquery.transform-0.9.5.min8d54.js?v=1551100772"></script>
<script src="js/owl.carousel.min-28d54.js?v=1551100772"></script>
<script src="js/particles.min8d54.js?v=1551100772"></script>
<script src="js/swiper.min8d54.js?v=1551100772"></script>
<script src="js/api.min158a.js?v=1551100879"></script>
<script src="js/bundle.min158a.js?v=1551100879"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {

$("#cemetery").owlCarousel({
    lazyLoad: true,
	autoplay: true,
	items: 6,
	responsive: {
        1199: {
            items: 6
        },
        1024: {
            items: 5
        },
        768: {
            items: 4
        },
        320: {
            items: 2
        }
	},
	onInitialized: function (event) {
	$("#cemetery").parent().css({opacity: 1})
}
});


$("#officesSlider").owlCarousel({
    lazyLoad: true,
    loop: true,
    autoplay: false,
    items: 4,
    margin: 1,
    nav: true,
    dots: false,
    smartSpeed: 600,
    responsive: {
        1024: {
            items: 3
        },
        768: {
            nav: true,
            items: 3,
            autoplay: false,
        },
        320: {
            nav: false,
            items: 1,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 800
        }
    }
});

});</script>

</body>
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