<?php 
		include('header.php');
		if(isset($_GET['PortfolioId']))
    {
        $PortfolioId=$_GET['PortfolioId'];
        $getData=mysql_query("select * from tblportfolio where PortfolioId='$PortfolioId'");
        $imageData=mysql_fetch_assoc($getData);
        $Image=$imageData['Image'];
        $IsActive=$imageData['IsActive'];

        if(isset($_POST['update']))
        {
						$Title=$_POST['Title'];
						$random1 = substr(number_format(time() * rand(),0,'',''),0,10);
            $Image=$random1.'_'.$_FILES['Image']['name'];
            $p1=$_FILES['Image']['tmp_name'];
            $path="upload/PortfolioImages/$Image";
            move_uploaded_file($p1,$path);
            $IsActive=$_POST['IsActive'];
            if($Image['Image']!='')
            {
                    $updateData="update tblportfolio set Title='$Title',Image='$Image',IsActive='$IsActive' where PortfolioId='$PortfolioId'";
            }
            else
            {
                    $updateData="update tblportfolio set Title='$Title',IsActive='$IsActive' where PortfolioId='$PortfolioId'";
            }
            $result=mysql_query($updateData);
            if($result)
            {
									$_SESSION['check']=3;
									echo '<script type="text/javascript">
									window.location="portfolio_list.php"
									</script>';
            }
						else
						{
							 ?>
										<center><div class="alert alert-danger" id="rec_not_updated" style="width:100%; display:inline-block; margin:0px 0px 10px 0px; font-size:20px"><strong>Your record was not Updated!</strong> 
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
					<h4 class="card-title" id="basic-layout-form">Edit a Portfolio</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="addImage" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> requiredments</h4>

								<div class="form-group">
									<label>Portfolio Tilte</label>
									<input type="text" class="form-control" required value="<?php echo $imageData['Title'];?>" placeholder="Tilte" name="Title">
								</div>


								<div class="form-group">
									<label>Portfolio Image</label>
									<label id="projectinput7" class="file center-block">
									<p><img src="upload/PortfolioImages/<?php echo $Image;?>" height="50" width="50" /></p>
										<input type="file"  name="Image" value="<?php echo $_FILES['Image']['name'];?>" id="file">
										<span class="file-custom"></span>
									</label>
								</div>

								<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="IsActive"
													<?php
													if($imageData['IsActive']==0)
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