<?php
		include('header.php');
   if(isset($_GET['BlogId']))
   {
       $BlogId=$_GET['BlogId'];
       $getData=mysql_query("select * from tblblogs where BlogId='$BlogId'");
       $blogData=mysql_fetch_assoc($getData);
       $BlogImage=$blogData['BlogImage'];
       $IsActive=$blogData['IsActive'];

       if(isset($_POST['update']))
       {
		   $MetaTitle=$_POST['MetaTitle'];
		   $MetaDescription=$_POST['MetaDescription'];
           $BlogTitle=$_POST['BlogTitle'];
		   $BlogDescription=$_POST['BlogDescription'];
		   $random1 = substr(number_format(time() * rand(),0,'',''),0,10);
		   if($BlogImage=='1')
		   {
			   $BlogImage=$random1.'_'.$_FILES['BlogImage']['name'];
		   }
		   else{
			     $BlogImage=$_FILES['BlogImage']['name'];
		   }
         
           $p1=$_FILES['BlogImage']['tmp_name'];
           $path="upload/BlogImages/$BlogImage";
           move_uploaded_file($p1,$path);
           $IsActive=$_POST['IsActive'];
           if($BlogImage['BlogImage']!='')
           {
                $updateData="update tblblogs set MetaTitle='$MetaTitle',MetaDescription='$MetaDescription',BlogTitle='$BlogTitle',BlogDescription='$BlogDescription',BlogImage='$BlogImage',IsActive='$IsActive' where BlogId='$BlogId'";
           }
           else
           {
                $updateData="update tblblogs set MetaTitle='$MetaTitle',MetaDescription='$MetaDescription',BlogTitle='$BlogTitle',BlogDescription='$BlogDescription',IsActive='$IsActive' where BlogId='$BlogId'";
           }
           $result=mysql_query($updateData);
           if($result)
           {

										$_SESSION['check']=3;
										echo '<script>
										window.location="blog_list.php"
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
					<h4 class="card-title" id="basic-layout-form">Edit a Blog</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="editBlogs" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<div class="form-group">
									<label>Meta Title</label>
									<input type="text" class="form-control" placeholder="Meta Title" value="<?php echo $blogData['MetaTitle']?>" required name="MetaTitle">
								</div>

								<div class="form-group">
									<label>Meta Description</label>
									<input type="text" class="form-control" placeholder="Meta Description" value="<?php echo $blogData['MetaDescription']?>" required name="MetaDescription">
								</div>

								<div class="form-group">
									<label>Blog Tilte</label>
									<input type="text" name="BlogTitle" class="form-control"  required value="<?php echo $blogData['BlogTitle']?>" placeholder="Blog Tilte" name="blogtitle">
								</div>

								<div class="form-group">
									<label>Blog Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="BlogDescription" placeholder="Blog Description"><?php echo $blogData['BlogDescription']?></textarea>
					                  <script>
					                    CKEDITOR.replace('editor1');
					                  </script>
								</div>
							</div>

								<div class="form-group">
									<label>Blog Image</label>
									<label id="projectinput7" class="file center-block">
									<p><img src="upload/BlogImages/<?php echo $BlogImage;?>" height="50" width="50" /></p>
										<input type="file" name="BlogImage" id="file" value="<?php echo $_FILES['BlogImage']['name'];?>">
										<span class="file-custom"></span>
									</label>
								</div>

								<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="IsActive"
													<?php
													if($blogData['IsActive']==1)
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
													if($blogData['IsActive']==0)
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