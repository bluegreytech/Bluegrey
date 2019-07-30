
 <?php $this->load->view('common/header'); ?>
  <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="<?php echo base_url(); ?>default/images/logo/logo-blue.png" alt="branding logo" width="100%"></div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with Topstarlogistics</span></h6>
            </div>
           
            <?php if(($this->session->flashdata('error'))){ ?>
        <div class="alert alert-danger" id="errorMessage">
        <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
        </div>
        <?php } ?>
        
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="post">
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="EmailAddress" class="form-control form-control-lg input-lg" placeholder="Type your Email address">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" required name="Password" class="form-control form-control-lg input-lg"  placeholder="Type your password">
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <!-- <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div> -->
                            <!-- <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.php" class="card-link">Forgot Password?</a></div> -->
                        </fieldset>
                        <input type="submit" name="logins" class="btn btn-primary btn-lg btn-block" value="Login"><br>
                        <a href="<?php echo $google_login_url;?>" >Login with google</a><br>
                        <input type="submit" id="fbLink" onclick="fbLogin()" class="btn btn-primary btn-lg btn-block" value="Login with Facebook">
                       
                    </form>
                </div>
            </div>
            <!-- <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="register-simple.html" class="card-link">Sign Up</a></p>
                </div>
            </div> -->
        </div>
    </div>
</section>

        </div>
      </div>
    </div>

    <?php $this->load->view('common/footer'); ?>

    <script>
$(function() { 
    setTimeout(function() {
  $('#errorMessage').fadeOut('fast');
}, 3000);
   
});

</script>




<script>
URL="<?php echo base_url('index.php/')?>";
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '616922428821448', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
          
           
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
            var saveData = $.ajax({
                type: 'POST',
                url: URL+"login/fblogin/",
                data: {id:response.id,first_name:response.first_name,last_name:response.last_name,email:response.email,picture:response.picture.data.url},
                dataType: "text",
                success: function(resultData) {
                    console.log(resultData);

                    if(resultData=='true'){
                       // location.reload(URL+'Program/Programlist');
                    }
                    //location.reload(URL+'Program/Programlist');
                }
            });
            saveData.error(function() { alert("Something went wrong"); });
            document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
      //  document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
      //  document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
      //  document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
    });



}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}




  </script>