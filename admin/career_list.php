<?php 
    error_reporting(0);
    include('header.php');
    // if(isset($_GET['QueryTypeId']))
    // {
    //     $QueryTypeId=$_GET['QueryTypeId'];
    //     $querydelete=mysql_query("delete from tblcareer where QueryTypeId='$QueryTypeId'")or die(mysql_error());
    //     if($querydelete)
    //     {
    //         $_SESSION['check']=2;
    //     }
    //     else
    //     {
    //         $_SESSION['check']=4;
    //     }		
    // }
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body"><!-- Basic Tables start -->

<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List of Users</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                <th>UserName</th>
                                <th>EmailAddress</th>
                                <th>MobileNumber</th>
                                <th>Position</th>
                                <!-- <th>UserResume</th> -->
                                <th>RemarkMessage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $i=1;
                                $select="select * from tblcareer ORDER BY CareerId DESC";
                                $row=mysqli_query($con,$select);
                                while($r1=mysqli_fetch_array($row))
                                {
                            ?>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $r1['UserName']; ?></td>
                                    <td><?php echo $r1['EmailAddress']; ?></td>
                                    <td><?php echo $r1['MobileNumber']; ?></td>
                                    <td><?php echo $r1['Position']; ?></td>
                                    <!-- <td><?php echo $r1['UserResume']; ?></td> -->
                                    <td><?php echo $r1['RemarkMessage']; ?></td>
                                     
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
        "sLengthMenu": "Show _MENU_ Users per page",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ Users"
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