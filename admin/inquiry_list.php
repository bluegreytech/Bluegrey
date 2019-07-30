<?php 
    error_reporting(0);
    include('header.php');
   
?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body"><!-- Basic Tables start -->
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List of Inquiry Type</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Mobile Number</th>
                                <th>Country</th>
                                <th>Intrested In</th>
                                <th>Description Message</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $i=1;
                                $select="SELECT inq.InquiryId, 
                                inq.FirstName,inq.LastName,inq.EmailAddress,inq.MobileNumber,inq.CountryId,inq.IntrestedTypeId,inq.DescriptionMessage,co.CountryName,intre.IntrestedType 
                                 FROM tblinquiry as inq
                                 JOIN tblcountry co ON inq.CountryId = co.CountryId 
                                 JOIN tblintrestedtype intre ON inq.IntrestedTypeId = intre.IntrestedTypeId ORDER BY InquiryId DESC";
                                $row=mysqli_query($con,$select);
                                while($r1=mysqli_fetch_array($row))
                                {
                            ?>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $r1['FirstName']; ?></td>
                                    <td><?php echo $r1['LastName']; ?></td>
                                    <td><?php echo $r1['EmailAddress']; ?></td>
                                    <td><?php echo $r1['MobileNumber']; ?></td>
                                    <td><?php echo $r1['CountryName']; ?></td>
                                    <td><?php echo $r1['IntrestedType']; ?></td>
                                    <td><?php echo $r1['DescriptionMessage']; ?></td>                          
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
        "sLengthMenu": "Show _MENU_ Inquiries per page",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ Inquiries"
    }
    });
 
</script>