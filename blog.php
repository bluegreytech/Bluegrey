<?php
include('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>

<title>Blog - Bluegrey Technologies</title>
 <meta name="description" content="Bluegrey Technologies Blog - Stay tuned with our blog for latest website design, Mobile App design & development, Digital Marketing and Web Design, eCommerce Industry new "/>
 
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



    <section class="hero hero--600" style="background-image:url(img/services/banner.jpg); alt="Our Blog">
	 <div class="container">
        <div class="hero__content">
            <h1 class="title title--uppercase">
                <span class="title__preheader title__preheader--tag">Company</span>
              Blog - BlueGrey Technologies         </h1>
            <p class="hero__lead">Explore the most recent trends and find our updates on all you need to know about what's going on in the world of web and technology.
</p>
        </div>
    </div>
</section>

<section>
        <div class="blog-list article-content">
                <div class="container">
                    <div class="offices__title">
                            <h2>LATEST NEWS AND INSIGHTS</h2>
                            <!--p></p-->
                    </div>
                    <div class="blog">
                        <div class="blog_wrapper">
                             <!--Select Loop Start-->
            <?php
                $select="SELECT * from tblblogs where IsActive='1' ORDER BY BlogId DESC";
                $row=mysqli_query($con,$select);
                while($r1=mysqli_fetch_array($row))
                {
            ?>
                    <!--Blog 1-->
                    <div class="blog_item">
                        <a href="blog-detail?BlogTitle=<?php echo str_replace(' ', '-',$r1['BlogTitle'])?>" target="_blank">
                            <div class="bi_img">
                                    <img src="admin/upload/BlogImages/<?php echo $r1['BlogImage']; ?>" alt="<?php echo $r1['BlogTitle']?>">
                            </div>
                            <div class="bi_title">
                                    <?php echo $r1['BlogTitle']?>
                            </div>
                            <div class="bi_content">
                             <?php 
                                        $rr=$r1['BlogDescription'];
                                        $str = substr($rr, 0, 180) . '...';
                                        echo $str;
                                        //echo substr("$rr",0,100);
                            ?>
                            </div>
                        </a>
                    </div>         
                <?php
                }
                ?> 
         <!--Select Loop End-->
                            
                        </div>
                    </div>
                </div>
        </div>
</section>

<?php include 'footer.php';?>