<?php
     include('admin/connection.php');
     if(isset($_POST['quote']))
     {
        $UserName=$_POST['UserName'];
        $EmailAddress=$_POST['EmailAddress'];
        $QueryTypeId=$_POST['QueryTypeId'];
        $MessageQuery=$_POST['MessageQuery'];
        $result=mysql_query("insert into tblquote(UserName,EmailAddress,QueryTypeId,MessageQuery)values('$UserName','$EmailAddress','$QueryTypeId','$MessageQuery')")or die(mysql_error());
        if($result)
        {
            echo '<script>
            window.location="index.php"
            </script>';
        }
        else
        {
            echo '<script>
            window.location="index.php"
            </script>';
        }
     }
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>BLUEGREY TECHNOLOGIES</title>
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
<body class="pages-index">

    <!-- Sliding div starts here -->
<div class="sidebar-contact">
    <img src="img/call.png" class="toggle">
    <h2>Contact Us</h2>
    <div class="scroll">
    <form class="form form--contact form--contact-page custom-form" method="post" enctype="multipart/form-data">
                                        <div class="form__box form__box--contact-page">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="UserName" maxlength="255" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="EmailAddress" maxlength="255" placeholder="Email Address" required>
                                            </div>
                                            <div class="form-group form__appearance">
                                                <select class="form__select" name="QueryTypeId">
                                                <option value="">Query Type</option>
                                                <?php
                                                $select1=mysql_query("select * from tblquerytype where IsActive='1'");
                                                while($r1=mysql_fetch_array($select1))
                                                {
                                                ?>
                                                <option value="<?php echo $r1['QueryTypeId'];?>"><?php echo $r1['QueryType'];?></option>					
                                                <?php
                                                }
                                                ?>
                                                </select>                   
                                            </div>
                                           <div class="form-group" required>
                                                <textarea class="form__textarea" name="MessageQuery" maxlength="65535" placeholder="Message"></textarea>
                                            </div>

                                            <button class="form__submit form__submit--contact form__submit--contact-page" type="submit" name="quote">
                                                Apply Now 
                                                </button>
                                          
                                        </div>
                                    </form>
    </div>
  </div>
<!-- Sliding div ends here -->

<div id="o-wrapper" class="wrapper overflow-hidden">

	<nav class="nav ">
		<div class="container">
			<div class="nav__logo">
				<a class="logo logo-white" href="index.php"></a>
            </div>
	<div class="nav__wrapper">
				
    <ul class="nav__list">
        <li class="menu-item">
                <a href="index.php" class="menu-item-link">Home</a>
            </li>
            <li class="menu-item has-dropdown">
                <a href="#" class="menu-item-link">Services</a>
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
                                            <a href="#" class="sub-item-link">
                                               Web Solutions <i class="isoi-angle-right "></i>
                                            </a>
                                            <div class="sub-menu__list-wrapper">
                                                    <ul class="sub-menu__list">
                                                        <li class="sub-menu__list-item">
                                                            <a href="web-development.php" class="sub-item-link sub-item-link--list">Web Development</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="web-design.php" class="sub-item-link sub-item-link--list">Web Design</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="digital-marketing.php" class="sub-item-link sub-item-link--list">Digital Marketing</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="mobile-application.php" class="sub-item-link sub-item-link--list">Mobile Application</a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </li>
                                </div>
                                <div class="sub-menu__wrapper">
                                     <li class="menu-item">
                                            <a href="#" class="sub-item-link">
                                               IT Services <i class="isoi-angle-right "></i>
                                            </a>
                                            <div class="sub-menu__list-wrapper">
                                                    <ul class="sub-menu__list">
                                                        <li class="sub-menu__list-item">
                                                            <a href="msp-services.php" class="sub-item-link sub-item-link--list">MSP Services</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="workstations-and-point-of-sale-systems.php" class="sub-item-link sub-item-link--list">Workstation & POS Systems</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="employee-productivity.php" class="sub-item-link sub-item-link--list">Employee Productivity</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="security-and-monitoring.php" class="sub-item-link sub-item-link--list">Security & Monitoring</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="network-infrastructure.php" class="sub-item-link sub-item-link--list">Network Infrastructure</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="data-protection-and-migration.php" class="sub-item-link sub-item-link--list">Data Protection & Migration</a>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </li>
                                </div>
                                <div class="sub-menu__wrapper">
                                     <li class="menu-item">
                                            <a href="#" class="sub-item-link">
                                               Customer Support <i class="isoi-angle-right "></i>
                                            </a>
                                            <div class="sub-menu__list-wrapper">
                                                    <ul class="sub-menu__list">
                                                        <li class="sub-menu__list-item">
                                                            <a href="inbound-call-center-services.php" class="sub-item-link sub-item-link--list">Inbound</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="outbound-call-center.php" class="sub-item-link sub-item-link--list">Outbound</a>
                                                        </li>
                                                        <li class="sub-menu__list-item">
                                                            <a href="live-chat.php" class="sub-item-link sub-item-link--list"> Live Chat</a>
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
                <a href="industries.php" class="menu-item-link">Industry</a>
            </li>
            <li class="menu-item">
                <a href="blog.php" class="menu-item-link">BLog</a>
            </li>
            <li class="menu-item">
                <a href="portfolio.php" class="menu-item-link">Portfolio</a>
            </li>
            <li class="menu-item has-dropdown">
                <a href="#" class="menu-item-link">Company</a>
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
                                            <a href="about.php#heroAbout"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                About </i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about.php#mission"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                Our Mission </i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about.php#vision"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                Our Vision</i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="about.php#wedo"  data-image="img/menu-items/1.jpg"
                                               data-descr=""
                                               data-link="img/menu-items/1.jpg" data-alt="Our Сlients Image" class="sub-item-link">
                                                What We Do</i>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="career.php"  data-image="img/menu-items/1.jpg"
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
				<a class="get-touch btn" href="contact-us.php">Contact Us</a><a id="c-button--push-left" href="#" class="sandwich menu-btn"></a>
			</div>
		</div>
	</nav>
