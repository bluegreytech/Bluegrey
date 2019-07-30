<?php 
	include('header.php');
	if(isset($_POST['save']))
    {
				$BlogId=$_POST['BlogId'];
				$random1 = substr(number_format(time() * rand(),0,'',''),0,10);
        $Image=$random1.'_'.$_FILES['Image']['name'];
        $p1=$_FILES['Image']['tmp_name'];
        $path="upload/BlogImages/$Image";
        move_uploaded_file($p1,$path);
        $IsActive=$_POST['IsActive'];

        $result=mysql_query("insert into tblblogimage(BlogId,Image,IsActive)values('$BlogId','$Image','$IsActive')");
        if($result)
        {
					$_SESSION['check']=1;
						echo '<script>
						window.location="blogimage_list.php"
					</script>';   
				}
				else
				{
					 ?>
								<center><div class="alert alert-danger" id="rec_not_insert" style="width:100%; display:inline-block; margin:0px 0px 10px 0px; fonnt-size:20px"><strong>Your record was not inserted!</strong> 
								 </div>  
								</center>
								<script>
									setTimeout(function() {
									$('#rec_not_insert').fadeOut('hide');
									}, 10000);	
							  </script>					
			<?php
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
					<h4 class="card-title" id="basic-layout-form">Add a Blog Image</h4>
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
									<select id="issueinput5" name="BlogId" required class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Blog Category" data-original-title="" title="">
											<option value="-1">Select Title</option>
											<?php
													$select1=mysql_query("select * from tblblogs ORDER BY BlogTitle ASC");
													while($r1=mysql_fetch_array($select1))
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
										<input type="file" required name="Image" id="file">
										<span class="file-custom"></span>
									</label>
								</div>
								</div>
							</div>

							<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="IsActive" value="1" checked="" class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Active</span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="IsActive" value="0" class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Deactive</span>
												</label>
											</div>
								</div>

							<div class="form-actions">
								<button type="submit" name="save" class="btn btn-primary">
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