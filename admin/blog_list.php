<?php 
    error_reporting(0);
    include('header.php');
    $BASE_URL=BASE_URL;
    if(isset($_GET['BlogId']))
    {
        $BlogId=$_GET['BlogId'];
        $queryselect=mysql_query("select * from tblblogs where BlogId='$BlogId'")or die(mysql_error());
        $r1=mysql_fetch_array($queryselect);
        $BlogImage=$r1['BlogImage'];
        $querydelete=mysql_query("delete from tblblogs where BlogId='$BlogId'")or die(mysql_error());
        unlink("upload/BlogImages/".$r1['BlogImage']);
        if($querydelete)
        {
            $_SESSION['check']=2;
            echo '<script>
            window.location="blog_list.php"
           </script>';
        }
        else
        {
            $_SESSION['check']=4;
            echo '<script>
            window.location="blog_list.php"
           </script>';
        }	
    }
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body"><!-- Basic Tables start -->
        <center><div class="alert alert-danger" id="rec_not_deleted" style="width:100%;display:none; margin:0px 0px 10px 0px"><strong>Your record was deleted successfully! </strong> 
            </div></center> 
        <center><div class="alert alert-success" id="rec_deleted" style="width:100%;display:none; margin:0px 0px 10px 0px"><strong>Your record was deleted successfully! </strong> 
            </div></center>  
        <center><div class="alert alert-success" id="rec_updated" style="width:100%;display:none; margin:0px 0px 10px 0px">
									<strong>Your record was updated successfully!</strong>
								</div>	  
						</center>
        <center><div class="alert alert-success" id="insert_rec" style="width:100%;display:none; margin:0px 0px 10px 0px">
									<strong>Your record was inserted successfully!</strong>
								</div>	  
						</center>
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List of Blog</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                
                                <th>Blog Title</th>
                                <th>Blog Description</th>
                                <th>Blog Image Path</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $i=1;
                                $select="select * from tblblogs ORDER BY BlogId DESC";
                                $row=mysql_query($select,$con);
                                while($r1=mysql_fetch_array($row))
                                {
                            ?>
                                    <td><?php echo $i; ?></td>
                                   
                                    <td><?php echo $r1['BlogTitle']; ?></td>
                                    <td><?php $rr=$r1['BlogDescription'];
                                        echo substr("$rr",0,100);?></td>
                                    <td><?php echo $BASE_URL."admin/upload/BlogImages/".$r1['BlogImage']; ?></td>
                                    <td>
                                        <?php
                                        if($r1['BlogImage']=='')
                                        {
                                            echo "N/A";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="upload/BlogImages/<?php echo $r1['BlogImage']; ?>" alt="" height="70" width="70">
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                            <?php 
                                            if($r1['IsActive']==1)
                                            {
                                                echo "Active"; 
                                            }
                                            else
                                            {
                                                echo "Deactive"; 
                                            }
                                            ?>
                                    </td>
                                    <td>
                                    <a href="edit_blog.php?BlogId=<?php echo $r1['BlogId']; ?>"><i class="ficon icon-pencil2"></i></a>
                                    <a href="blog_list.php?BlogId=<?php echo $r1['BlogId']; ?>"><i class="ficon icon-bin"></i></a>
                                    </td>  
                                </tr>      
                                <?php
                                $i++;
                                    }
                                ?>           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->



        </div>
      </div>
    </div>

<?php include('footer.php');?>
<script>
    $('#example').dataTable( {
    "oLanguage": {
        "sLengthMenu": "Show _MENU_ Blogs per page",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ Blogs"
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
	$('#rec_deleted').css('display','block');
		setTimeout(function(){
		    $('#rec_deleted').css('display','none');
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
	$('#rec_updated').css('display','block');
		setTimeout(function(){
		    $('#rec_updated').css('display','none');
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
	if(check==4) {
	$('#rec_not_deleted').css('display','block');
		setTimeout(function(){
		    $('#rec_not_deleted').css('display','none');
            }, 10000);
		}
	});

</script>