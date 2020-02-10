
function logout(){
	var sessionURL = localStorage.getItem('url');
	localStorage.removeItem('token');
	localStorage.removeItem('username');
	localStorage.removeItem('role');
    var url = window.location.pathname;
    var t = url;
    t = t.substr(0, t.lastIndexOf("/"));
	window.location.href = t;
}

$(document).ready(function(){
	var sesUser = localStorage.getItem('username');
	var sesToken = localStorage.getItem('token');
	var sesRole = localStorage.getItem('role');
	var orgname = localStorage.getItem('orgName');
    var url = window.location.pathname;
    var t = url;
    t = t.substr(0, t.lastIndexOf("/"));

	if(sesUser != null && sesToken != null && sesRole != null && orgname != null){
		$('#userName').html(sesUser);
		//console.log(localStorage.token);
		$('.userRole').find('.email').text(sesRole.toUpperCase() + ' ' +'user'.toUpperCase());
		$('.orgname').find('.organization').text(orgname.replace(/_/g, ' ').toUpperCase());

	}
	else{
		window.location.href= t;
		//alert('error')
	}
	

	$('#logout').click(function(){
		if(confirm("Are you sure you want to log-out? If yes click ok to proceed and if not click cancel to go back to the dashboard.")){
        	logout();
    	}
    	else{
        	return false;
    	} 
	})

	         
    window.onload = reset_main_timer;
    document.onmousemove = reset_main_timer;
    document.onkeypress = reset_main_timer;
    
    // create main_timer and sub_timer variable with 0 value, we will assign them setInterval object
    var main_timer = 0;
    var sub_timer = 0;

 
    var user_logged_in = $("#user_logged_in").val()

    function dialog_set_interval(){
    	var autologout = 30 * 60 * 1000;
        main_timer = setInterval(function(){
            if(user_logged_in == "true"){
                
                sub_timer = setInterval(function(){
                    	localStorage.removeItem('token');
						localStorage.removeItem('username');
						localStorage.removeItem('role');
						localStorage.setItem('session','expired');
                        var url = window.location.pathname;
    var t = url;
    t = t.substr(0, t.lastIndexOf("/"));
						window.location.href= t;
						
                },autologout);

            }
        },500);
    }
    function reset_main_timer(){
        clearInterval(main_timer);
        dialog_set_interval();
    }
    $(".inactivity_ok").click(function(){
        clearInterval(sub_timer);
        if($("#user_activity").val() == "inactive"){
            window.location = window.location 
        }
    });

});