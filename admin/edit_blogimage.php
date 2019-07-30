<?php 
	include('header.php');
	if(isset($_GET['ImageblogId']))
	{
			$ImageblogId=$_GET['ImageblogId'];
			$getData=mysqli_query($con,"SELECT tb.ImageblogId,tb.BlogId,tb.Image,tb.IsActive,tl.BlogTitle FROM tblblogimage as tb 
			JOIN tblblogs tl ON tb.BlogId = tl.BlogId WHERE ImageblogId='$ImageblogId'");
			$imageData=mysqli_fetch_assoc($getData);
			$BlogId=$imageData['BlogId'];
			$BlogTitle=$imageData['BlogTitle'];
			$Image=$imageData['Image'];
			$IsActive=$imageData['IsActive'];

			if(isset($_POST['update']))
			{
					$BlogId=$_POST['BlogId'];
					$random1 = substr(number_format(time() * rand(),0,'',''),0,10);
					$Image=$random1.'_'.$_FILES['Image']['name'];
					$p1=$_FILES['Image']['tmp_name'];
					$path="upload/BlogImages/$Image";
					move_uploaded_file($p1,$path);
					$IsActive=$_POST['IsActive'];
					$UpdatedBy=$UserId;
					$UpdatedOn=date("Y-m-d h:i:s");
					if($Image['Image']!='')
					{
									$updateData="update tblblogimage set BlogId='$BlogId',Image='$Image',IsActive='$IsActive' where ImageblogId='$ImageblogId'";
					}
					else
					{
									$updateData="update tblblogimage set  BlogId='$BlogId',IsActive='$IsActive' where ImageblogId='$ImageblogId'";
					}
					$result=mysql_query($updateData);
					if($result)
					{
								$_SESSION['check']=3;
								echo '<script>
								window.location="blogimage_list"
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
					<h4 class="card-title" id="basic-layout-form">Edit a Blog Image</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="addImage" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<div class="col-md-6">
								<div class="form-group">
									<label for="issueinput5">Select Title</label>
									<select id="issueinput5" required name="BlogId" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Blog Category" data-original-title="" title="">
														<option value="<?php echo $BlogId; ?>"><?php echo $BlogTitle ?></option>
											<?php
													$select1=mysqli_query($con,"select * from tblblogs");
													while($r1=mysqli_fetch_array($select1))
													{
													?>
															<option value="<?php echo $r1['BlogId'];?>"><?php echo $r1['BlogTitle'];?></option>					
													<?php
													}
													?>
                    </select>

								</div>
								</div>
								<div class="col-md-6"></div>
								<div class="col-md-12">
								<div class="form-group">
									<label> Blog Image</label>
									<label id="projectinput7" class="file center-block">
									<p><img src="upload/BlogImages/<?php echo $Image;?>" height="50" width="50" /></p>
										<input type="file" requiredd value="<?php echo $_FILES['Image']['name'];?>" name="Image" id="file">
										<span class="file-custom"></span>
									</label>
								</div>
								</div>
							</div>

							<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="IsActive"
													<?php
													if($imageData['IsActive']==1)
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
													if($imageData['IsActive']==0)
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
									<i class="icon-check2"></i> Insert
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