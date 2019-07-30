<?php 
include('admin/connection.php');

if(isset($_GET['BlogTitle']))
{    
	$BlogTitle= str_replace('-',' ',$_GET['BlogTitle']);
    //$BlogTitle=$_GET['BlogTitle'];
    $selectmeta=mysqli_query($con,"SELECT * from tblblogs where IsActive='1' AND BlogTitle='$BlogTitle'");
    $blogmetaData=mysqli_fetch_assoc($selectmeta);
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>

<!-- <title> Our Blog - Bluegrey Technologies</title> -->
<title><?php echo $blogmetaData['MetaTitle']?></title>
 <meta name="description" content="<?php echo $blogmetaData['MetaDescription']?>"/>
 
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
//include('admin/connection');

if(isset($_GET['BlogTitle']))
{    
	$BlogTitle= str_replace('-',' ',$_GET['BlogTitle']);
    //$BlogTitle=$_GET['BlogTitle'];
    $select=mysqli_query($con,"SELECT * from tblblogs where IsActive='1' AND BlogTitle='$BlogTitle'");
    $blogData=mysqli_fetch_assoc($select);
}
?>

<section class="post-single" style="background-image: url(admin/upload/BlogImages/<?php echo $blogData['BlogImage']; ?>);background-repeat: no-repeat;background-position: center;background-size: cover;">
    <header class="post-single__header">
        <div class="container">
            <h1 class="entry-title page-title post-single__title">
            <?php echo $blogData['BlogTitle']?>
            </h1>            
        </div>
    </header>
</section>

<section>
        <div class="blog-list article-content">
                <div class="container">
                   <div class="blog">
                        <div class="blog_wrapper_detail">
                            <!--Blog Detail-->
                            <div class="blog_item_detail">
                                    <div class="bi_content">
                                           
                                            
                                            <!-- <img src="admin/upload/BlogImages/<?php //echo $blogData['BlogImage']; ?>" alt="<?php //echo $blogData['BlogTitle']?>" style="width: 100%"> -->
                                            <br>
                                            <?php echo $blogData['BlogDescription']?>
                                    </div>
                            </div>
                            <!--Blog Sidebar-->
                            <div class="blog_sidebar">
                             <!--Select Loop Start-->
                                <h2 class="enquiry_info1">Related Blog</h2>
                                <!--Item 1 Start-->
                           <?php
                                $select="SELECT * from tblblogs where BlogTitle!='$BlogTitle' AND IsActive='1' ORDER BY BlogId DESC LIMIT 3";
                                $row=mysqli_query($con,$select);
                                while($r1=mysqli_fetch_array($row))
                                {
                            ?>
                                 <a href="blog-detail?BlogTitle=<?php echo str_replace(' ', '-',$r1['BlogTitle'])?>">
                                    <div class="bi_img_detail">
                                    <img src="admin/upload/BlogImages/<?php echo $r1['BlogImage']; ?>" alt="<?php echo $r1['BlogTitle']?>">
                                        <p> <?php echo $r1['BlogTitle']?></p>
                                    </div>
                                </a>
                            <?php
                                }
                            ?> 
                                <!--Item 1 End-->
                               
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</section>

<?php include 'footer.php';?>