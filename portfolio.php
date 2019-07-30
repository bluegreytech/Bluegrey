<?php 
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>

<title>Portfolio - Bluegrey Technologies</title>
 <meta name="description" content="Bluegrey Technologies is one of leading IT company. We have undertaken various web projects on account of it's team. Visit our portfolio today!"/>
 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        


</head>
<?php include 'menu.php';?>



    <section class="hero hero--600" style="background-image:url(img/services/banner.jpg); alt="bluegrey portfolio">
    <div class="container">
        <div class="hero__content">
            <h1 class="title title--uppercase">
                <span class="title__preheader title__preheader--tag">Company</span>
               Our Showcase Of Work</h1>
            <p class="hero__lead"> At Bluegrey Technologies, we focus on the client's prerequisites to deliver results. We convey the best UI/UX design effect right from the initial stage to the last dispatch. Check out our portfolio of work to see how every single one of our designs is confined and crafted pixel by pixel by our specialists. Apart from that, we completely create your website from scratch and don't resort to paid templates online to create a unique website specially for your business. Rest assured, if you give us an opportunity to build your website, we guarantee you that our services will never disappoint you.
        </div>
    </div>
</section>


<section id="" class=" cemetery__title--center cemetery cemetery-about panel hide">
    <div class="container" style="opacity: 1;">
        <div class="cemetery__title cemetery__title--center">
            <h2>Our Portfolio</h2>
                            <p class="description">For over 10 years, Bluegrey Technologies has been helping Fortune 800 companies and established brands build solid IT foundations for their businesses.</p>
                    </div>
        <div id="cemetery" class="owl-carousel owl-theme owl-loaded owl-drag"></div>
    </div>
</section>

<section class="blog-list posts">
    <div class="container">
        <div class="row">
             <!--Select Loop Start-->
            <?php
                $select="SELECT * from tblportfolio where IsActive='1' ORDER BY PortfolioId DESC";
                $row=mysqli_query($con,$select);
                while($r1=mysqli_fetch_array($row))
                {
            ?>
            <div class="col-lg-4" style="margin-top:25px;">
                <a data-fancybox="gallery" href="admin/upload/PortfolioImages/<?php echo $r1['Image']; ?>">
                <div class="port">
                <img src="admin/upload/PortfolioImages/<?php echo $r1['Image']; ?>" alt="<?php echo $r1['Title']?>">
                </div>
                 <div class="ptitle text-center">
                <span><?php echo $r1['Title']?></span>
                </div>
                </a>
            </div>
            <?php
                }
                ?> 
         <!--Select Loop End-->
          
        </div>
    </div>
</section>

<?php include 'footer.php';?>