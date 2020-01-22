function config(){
   $.get("config.php", function(data, status){
      localStorage.setItem('url',data);

    });
}
$(document).ready(function(){
  config();
  var sessionURL = localStorage.getItem('url');

  if(localStorage.getItem('token') != null){
    window.location.href = "dashboard.php";
  }
  $("#submit").click(function(){
    var txtUser = $('#email');
    var txtPass = $('#password');
    var user = txtUser.val();
    var password = txtPass.val();
    $('.notification').text('');
        $.ajax({
            type: 'POST',
            data:{
                username: user,
                password: password
            },

            url: sessionURL + '/api/site/login',
            beforeSend: function(textStatus,xml) {
                 $('#submit').text('');
                 $('#submit').append('Signing In <i class="fa fa-spinner fa-pulse"></i>');
            },
            success: function(data, textStatus ){
               //console.log(data.message);
               var token = data.token['access_token'];
               var org = data.message['organization_id'];
               var role = data.message['role'];
               var user = data.message['username'];
               var orgName = data.message['organization_name']

              if(window.localStorage){
                localStorage.setItem('token', token);
                localStorage.setItem('organization', org);
                localStorage.setItem('role', role);
                localStorage.setItem('username', user);
                localStorage.setItem('orgName',orgName);
                  window.setTimeout(function() {
                      window.location.href = 'dashboard.php';
                  }, 3000);
               }

            },
            error: function(exemp ,xml, status){
              txtUser.val('');
              txtPass.val('');            
              $('#submit').text('SIGN IN');
              $('.notification').append('<div class="alert alert-danger" role="alert">Provided information was incorrect. Kindly provide the correct information to continue.</div>');
             //console.info(exemp);

            }
        });
    });
  if(localStorage.getItem('session') == 'expired'){
    alert('Enough inactivity was detected on your session that caused your profile to be logged-out. Please click on (the check icon) below to access the portal again.');
    localStorage.removeItem('session');
  }
});

