<?php
		include('header.php');
   if(isset($_GET['IntrestedTypeId']))
   {
       $IntrestedTypeId=$_GET['IntrestedTypeId'];
       $getData=mysqli_query($con,"select * from tblintrestedtype where IntrestedTypeId='$IntrestedTypeId'");
       $intrestedData=mysqli_fetch_assoc($getData);
       $IsActive=$intrestedData['IsActive'];

       if(isset($_POST['update']))
       {
          $IntrestedType=$_POST['IntrestedType'];
          $IsActive=$_POST['IsActive'];
          $updateData="update tblintrestedtype set IntrestedType='$IntrestedType',IsActive='$IsActive' where IntrestedTypeId='$IntrestedTypeId'";
          $result=mysqli_query($con,$updateData);
          if($result)
          {

										$_SESSION['check']=3;
										echo '<script>
										window.location="intrestedtype_list"
									 </script>';
					}
					 else
					 {
							?>
									 <center><div class="alert alert-danger" id="rec_not_updated" style="width:100%; display:inline-block; margin:0px 0px 10px 0px; fonnt-size:20px"><strong>Your record was not Updated!</strong> 
										</div>  
									 </center>
									 <script>
										 setTimeout(function() {
										 $('#rec_not_updated').fadeOut('hide');
										 }, 10000);	
									 </script>					
				 <?php
					 }
       }

   }
?>

  <div class="app-content content container-fluid">
    <div class="content-wrapper">
        
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Edit a Job Type</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="editBlogs" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<div class="form-group">
									<label>Job Title</label>
									<input type="text" name="IntrestedType" class="form-control" required value="<?php echo $intrestedData['IntrestedType']?>" placeholder="Job Title">
								</div>

						
							</div>

								<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="IsActive"
													<?php
													if($intrestedData['IsActive']==1)
													{
															echo "checked";
													}
													?>
													 value="1" checked="" class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Active</span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="IsActive"
													<?php
													if($intrestedData['IsActive']==0)
													{
															echo "checked";
													}
													?>
													 value="0" class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Deactive</span>
												</label>
											</div>
								</div>

							<div class="form-actions">
								<button type="submit" name="update" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
			
	</div>
</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>

<?php include 'footer.php';?>