function browserSupportFileUpload() {
    var isCompatible = false;
    if (window.File && window.FileReader && window.FileList && window.Blob) {
    isCompatible = true;
    }
    return isCompatible;
}
function UploadIt(buttonID) {
  var fileUpload = document.getElementById(buttonID);
  var allowedFiles = ['.csv'];
  var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$"); // /^([a-zA-Z0-9()\s_\\.\-:])+(.csv)$/;  
  if (regex.test(fileUpload.value.toLowerCase())) {
      if (typeof (FileReader) != "undefined") {
          var reader = new FileReader();
          reader.onload = function (e) {
              var lines=e.target.result.split('\r');
              for(let i = 0; i<lines.length; i++){
              lines[i] = lines[i].replace(/\n/,'')//delete all blanks
              }
              var result = [];

              var headers=lines[0].split(",");

                $('.nav-tabs').find('.nav-item').each(function(){
                    if($(this).hasClass('active')){
                         var dataAttr = $(this).attr('dataAttr');
                        if($(this).attr('data-attr') == 'occ_description' && headers.indexOf('"OCC Description"')> 1){
                                for(var i=1;i<lines.length;i++){

                                  var obj = {};
                                  var currentline=lines[i].split(",");

                                  for(var j=0;j<headers.length;j++){
                                      obj[headers[j]] = currentline[j];
                                  }
                                  
                                  result.push(obj);
                                  

                              }
                         }
                         else if($(this).attr('data-attr') == 'call_usage_type' && headers.indexOf('"Call & Usage Type"')> 1){
                             for(var i=1;i<lines.length;i++){

                                  var obj = {};
                                  var currentline=lines[i].split(",");

                                  for(var j=0;j<headers.length;j++){
                                      obj[headers[j]] = currentline[j];
                                  }
                                  
                                  result.push(obj);
                                  

                              }
                        }
                         else if($(this).attr('data-attr') == 'charge_type_description' && headers.indexOf('"Charge Type Description"')> 1){
                              for(var i=1;i<lines.length;i++){

                                  var obj = {};
                                  var currentline=lines[i].split(",");

                                  for(var j=0;j<headers.length;j++){
                                      obj[headers[j]] = currentline[j];
                                  }
                                  
                                  result.push(obj);
                                  

                              }
                         }
                         else{
                             alert('Make sure your file matched with active category!');
                             $('input[type=file]').val('');
                         }
                     }
                })
              
              var lastItem = result.pop();

              var parseJson = JSON.stringify(result);
              var strJson = parseJson.replace(/\\"/g, "");

              $('#jsonOutput').append(strJson);
             
              return JSON.stringify(result); //JSON
          }
          reader.readAsText(fileUpload.files[0]);
      } else {
          alert("This browser does not support HTML5.");
      }
  } else {
      alert("Please upload a valid CSV file.");
  }
}

function checkUrlParam(urlParam){
    if(urlParam.indexOf('organization') > -1){
        $('#org').addClass('active');
    }
    else if(urlParam.indexOf('dashboard') > -1){
        $('#dashboard').addClass('active');
    }
    else if(urlParam.indexOf('upload') > -1){
        $('#upload').addClass('active');
    }
    else if(urlParam.indexOf('history') > -1){
        $('#history').addClass('active');
    }
    else if(urlParam.indexOf('reports') > -1){
        $('#reports').addClass('active');
    }
    else if(urlParam.indexOf('users') > -1){
        $('#user').addClass('active');
    }
    else if(urlParam.indexOf('cost') > -1){
        $('#cost').addClass('active');
    }

}
function alertStatus(status){
    var userformdiv = $('#userformdiv');
    userformdiv.empty();
    userformdiv.prepend(
        '<div class="row form-group">'+
        '<div class="col col-md-12">'+
        '<div class="alert alert-danger" role="alert">' + status.replace(/\n/g, "<br>") + '</div>'+
        '</div></div>'
    );
}
function archiveOrg(val){

 if(confirm("Are you sure you want to archive this organization and its inner organizations? If yes click ok to confirm and if no please click cancel to proceed")){
    $.ajax({
        type: 'POST',
        data:{
            id:val,
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url') + '/api/organization/delete/'+val+"?token="+localStorage.getItem('token'),
        success: function(data, textStatus ){
             alert('Archive has been successfully completed!');
             $.ajax({
                    type: 'POST',
                    data:{
                        token: localStorage.getItem('token'),
                        url: localStorage.getItem('url')
                    },

                    url: 'getData.php',
                    success: function(data, textStatus ){
                       
                        $('#data-table').empty();
                        $('#data-table').prepend(data);
                        $('table.orgTable').DataTable();
                        $('.modal').removeClass('show');
                        $('.modal').removeAttr('style');
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        $('div.modal-backdrop.fade.show').remove();

                    },
                    error: function(xhr, textStatus, errorThrown){
                       //alert('You have provided an organization name that is already existing. Please provide a new organization name, for creation to proceed.');
                    }
                });

        },
        error: function(xhr, textStatus, errorThrown){
          console.log(xhr + " " + textStatus + " " + errorThrown);
        }
    });
  }
  else{
      return false;
  }


}
function editOrg(val){
 $.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url')+ '/api/organization',
        success: function(data, textStatus ){
             $.each(data.message, function(i, v) {
              if (v.organization_id == val) {
                  $('#editOrg #orgname').val(v.organization_name);
                  $('#updateOrganization').attr('rel',v.organization_name);
                  $('#editOrg #orgname').attr('data-attr',v.organization_id);
                  $('#editOrg #orgname').attr('data-status',v.organization_deleted);
                  return;
              }
          });

        },
        error: function(xhr, textStatus, errorThrown){
        }
    });

$('#archiveOrg').click(function(){
  var id = $('#editOrg #orgname').attr('data-attr');

  if(confirm("Are you sure you want to archive this organization and its inner organizations? If yes click ok to confirm and if no please click cancel to proceed")){
      $.ajax({
          type: 'POST',
          data:{
              id:$('#editOrg #orgname').attr('data-attr'),
              token: localStorage.getItem('token')
          },

          url: localStorage.getItem('url') + '/api/organization/delete/'+id+"?token="+localStorage.getItem('token'),
          success: function(data, textStatus ){
               alert('Archive has been successfully completed!');
               $.ajax({
                      type: 'POST',
                      data:{
                          token: localStorage.getItem('token'),
                          url: localStorage.getItem('url')
                      },

                      url: 'getData.php',
                      success: function(data, textStatus ){
                         
                          $('.orgTable').empty();
                          $('.orgTable').append(data);
                          $('table.orgTable').DataTable();
                          $('.modal').removeClass('show');
                          $('.modal').removeAttr('style');
                          $('body').removeClass('modal-open');
                          $('body').removeAttr('style');
                          $('div.modal-backdrop.fade.show').remove();

                      },
                      error: function(xhr, textStatus, errorThrown){
                         //alert('You have provided an organization name that is already existing. Please provide a new organization name, for creation to proceed.');
                      }
                  });

          },
          error: function(xhr, textStatus, errorThrown){
            console.log(xhr + " " + textStatus + " " + errorThrown);
          }
      });
    }
    else{
        return false;
    }

})
 $('#updateOrganization').click(function(){
         
    var updatetxtOrg = $('#editOrg #orgname');
    var org = updatetxtOrg.val();

      if(confirm("Do you wish to edit the information for "+$(this).attr('rel')+"? If yes please click ok to confirm and if no please click cancel to proceed")){
          $.ajax({
            type: 'POST',
            data:{
                name: org,
                token: localStorage.getItem('token'),
                id: val
            },

            url: localStorage.getItem('url') + '/api/organization/edit/'+val,
            beforeSend: function( textStatus ) {
               $('#updateOrganization').text('');
               $('#updateOrganization').append('Updating Organization <i class="fa fa-spinner fa-pulse"></i>');

            },
            success: function(data, textStatus ){
                 alert("Successfully updated organization!");

                $.ajax({
                    type: 'POST',
                    data:{
                        token: localStorage.getItem('token'),
                        url: localStorage.getItem('url')
                    },

                    url: 'getData.php',
                    success: function(data, textStatus ){
                       
                        $('#data-table').empty();
                        $('#data-table').append(data);
                        //$('table.orgTable').DataTable();
                        $('table.orgTable').DataTable();
                        $('.modal').removeClass('show');
                        $('.modal').removeAttr('style');
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        $('div.modal-backdrop.fade.show').remove();

                    },
                    error: function(xhr, textStatus, errorThrown){
                       //alert('You have provided an organization name that is already existing. Please provide a new organization name, for creation to proceed.');
                    }
                });
                $('#updateOrganization').text('Submit');
                $('#editOrg #orgname').val('');

            },
            error: function(xhr, textStatus, errorThrown){
               $('#updateOrganization').text('Submit');
               $('#editOrg #orgname').val('');
               console.log(xhr + ',' + textStatus + ',' + errorThrown + ' ' + val);
               alert('You have provided an organization name that is already existing. Please provide a new organization name, for creation to proceed.');

            }
        });
      }
      else{
          return false;
      }

  });
}
function editButton(val){
  //alert(val);
    $.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url')+ '/api/user',
        success: function(data, textStatus ){
             $.each(data.message, function(i, v) {
              if (v.user_id == val) {
                  $('#editModal #firstname').val(v.user_first_name);
                  $('#editModal #lastname').val(v.user_last_name);
                  $('#editModal #username').val(v.user_username);
                  $('#editModal #email').val(v.user_email);
                  $('#editModal #txtRole').text(v.user_role);
                  $('#editModal #txtOrg').text(v.user_organization_name);
                  $('#editModal #password').remove();
                  $('#editModal #confirmpass').remove();
                  return;
              }
          });

        },
        error: function(xhr, textStatus, errorThrown){
        }
    });
    $('#updateUser').click(function(){
          var updatefirstname = $('#editModal #firstname').val();
          var updatelastname = $('#editModal #lastname').val();
          var updateemail = $('#editModal #email').val();
          var updateusername = $('#editModal #username').val();

            if(confirm("Do you wish to edit the information listed? If yes please click update to confirm and if no please click cancel to proceed")){
              $.ajax({
                type: 'POST',
                data:{
                    username: updateusername,
                    first_name: updatefirstname,
                    last_name: updatelastname,
                    email: updateemail,
                    id: val,
                    token: localStorage.getItem('token')
                },

                url: localStorage.getItem('url') + '/api/user/edit/'+val,
                beforeSend: function( textStatus ) {
                   $('#updateUser').text('');
                   $('#updateUser').append('Adding Organization <i class="fa fa-spinner fa-pulse"></i>');

                },
                success: function(data, textStatus ){
                  alert('Successfully updated details!');
                  $.ajax({
                      type: 'POST',
                      data:{
                          token: localStorage.getItem('token'),
                          //url: window.location.pathname,
                          url: localStorage.getItem('url'),
                          role: localStorage.getItem('role'),
                          user: localStorage.getItem('username')

                      },
                      url: 'getUsers.php',
                      success: function(data, textStatus){
                          $('#userData').empty();
                          $('#userData').prepend(data);
                          $('#userformdiv').empty();
                          $('table.usersTable').DataTable(); 
                      },
                      error: function(xhr, textStatus, errorThrown){
                          console.log(textStatus);
                      }
                  })
                  $('#updateUser').text('Submit');
                },
                error: function(xhr, textStatus, errorThrown){
                  $('#updateUser').text('Submit');
                   console.log(xhr);

                }
            });

            }
            else{
                return false;
            }

          
    })
}


function organizationControls(){
$("#userData").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find("#userName").text(); // Find the text

    //alert($text);
});


 $("#submitOrganization").click(function(){
    var txtOrg = $('#orgname');
    var org = txtOrg.val();
    if(txtOrg.val() == ''){
      alert('Organization name cannot be empty!');
    }
    else{
      $.ajax({
        type: 'POST',
        data:{
            name: org,
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url') + '/api/organization',
        beforeSend: function( textStatus ) {
           $('#submitOrganization').text('');
           $('#submitOrganization').append('Adding Organization <i class="fa fa-spinner fa-pulse"></i>');

        },
        success: function(data, textStatus ){
            //console.log(JSON.stringify(data));
             alert("Successfully added organization!");

            $.ajax({
                type: 'POST',
                data:{
                    token: localStorage.getItem('token'),
                    url: localStorage.getItem('url')
                },

                url: 'getData.php',
                success: function(data, textStatus ){
                   
                    $('.orgTable').empty();
                    $('.orgTable').prepend(data);
                    $('table.orgTable').DataTable();
                    $('.modal').removeClass('show');
                    $('.modal').removeAttr('style');
                    $('body').removeClass('modal-open');
                    $('body').removeAttr('style');
                    $('div.modal-backdrop.fade.show').remove();

                },
                error: function(xhr, textStatus, errorThrown){
                   alert('You have provided an organization name that is already existing. Please provide a new organization name, for creation to proceed.');
                }
            });
            $('#submitOrganization').text('Submit');
            $('#orgname').val('');

        },
        error: function(xhr, textStatus, errorThrown){
           $('#submitOrganization').text('Submit');
           $('#orgname').val('');
           console.log(xhr + ',' + textStatus + ',' + errorThrown);
           alert('You have provided an organization name that is already existing. Please provide a new organization name, for creation to proceed.');

        }
      });
    }
    

});

 $("#submitUser").click(function(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var userRole = $('#drpdownRole').val();
    var userOrg = $('#drpdownOrg').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var username = $('#username').val();
    var matched = $('#confirmpass').val();

     if(confirm("All information has been filled-up, please click on submit to confirm that all placed information are accurate and correct, if not please click on cancel to edit further")){
       if(password != matched){
        alertStatus("Password did not match");
    }
    else if($('#drpdownOrg').val() == 0 || $('#drpdownRole').val() == 0){
        if($('#drpdownOrg').val() == 0){
            alertStatus("Organization must not be empty");
        }
        else if($('#drpdownRole').val() == 0){
            alertStatus("User role must not be empty");
        }
    }
    else{
            $.ajax({
                type: 'POST',
                data:{
                    username: username,
                    first_name: firstname,
                    last_name: lastname,
                    email: email,
                    organization_id: userOrg,
                    role: userRole,
                    password: password,
                    token: localStorage.getItem('token')
                },

                url: localStorage.getItem('url') + '/api/user',
                beforeSend: function( textStatus ) {
                   $('#submitUser').text('');
                   $('#submitUser').append('Adding User <i class="fa fa-spinner fa-pulse"></i>');           

                },
                success: function(data, textStatus ){
                    //console.log(JSON.stringify(data)); 
                        alert("User has been successfully added!");
                        $('#submitUser').text('Submit');
                        $('#userModal').find('input[type=text]').val('');
                        $.ajax({
                            type: 'POST',
                            data:{
                                token: localStorage.getItem('token'),
                                //url: window.location.pathname,
                                url: localStorage.getItem('url'),
                                role: localStorage.getItem('role'),
                                user: localStorage.getItem('username')

                            },
                            url: 'getUsers.php',
                            success: function(data, textStatus){
                                $('#userData').empty();
                                $('#userData').prepend(data);
                                $('#userformdiv').empty();
                                $('table.usersTable').DataTable(); 
                            },
                            error: function(xhr, textStatus, errorThrown){
                                console.log(textStatus);
                            }
                        })
                        
                },
                error: function(xhr, textStatus, errorThrown){
                    alertStatus(xhr.responseJSON.message);
                   $('#submitUser').text('Submit');
                   //$('#orgname').val('');
                }
            }); 

      }
    }
    else{
        return false;
    }

   
});

$('#userModal button[type="reset"]').click(function(){
 if(confirm("Are you sure you want to clear all filled-up information? If yes click submit to confirm, if not please click clear to cancel this action")){
        $('#userform').find('input[type=text]').val('');
        $('#userform').find('input[type=password]').val('');
        $('#drpdownRole option[value="0"]').attr('selected',true);
        $('#drpdownOrg option[value="0"]').attr('selected',true);
    }
  else{
        return false;
  }

  
  })
}
checkUrlParam(window.location.href);
function pagination(limit){
   var limit = $('#paginator').val();
    
}
function onLoadData(){
    
    if(window.location.pathname=="/web_portal_fe/cost.php"){
        //costCentreView();
    }
    else if(window.location.pathname=="/web_portal_fe/dashboard.php"){
        //monthlyBilling();
    }
      //$('.welcomeNote').text('Welcome back,');
if(localStorage.getItem('status') == 'logged'){
  alert('Welcome back, ' + localStorage.getItem('username'));
  localStorage.removeItem('status');
}
var getDate = new Date();
var currMonth = getDate.getMonth();
$('.monthOverview').val(currMonth + 1);
    $('input').bind('keydown', function (event) {
            switch (event.keyCode) {
                case 8:  // Backspace
                case 9:  // Tab
                case 13: // Enter
                case 37: // Left
                case 38: // Up
                case 39: // Right
                case 40: // Down
                break;
                default:
                var regex = new RegExp("^[a-zA-Z0-9.,/ $@()]+$");
                var key = event.key;
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
                break;
            }
    });
    var sessionData = localStorage.getItem('role');
    var sessionURL = localStorage.getItem('url');
    if(sessionData == 'standard' || sessionData == 'basic'){
        $('#drpdownOrg1').remove();
        $('#drpdownOrg2').remove();
        $('#drpdownOrg3').remove();
        $('input[type="file"]').remove();
        $('.tab-pane').find('button').remove();
        $('.userButton').remove();
        $('.orgButton').remove();
        $('.organizationTable').remove();
        $('.organizationInfo').append('<h4>Current Organization: ' + localStorage.getItem('orgName') + '</h4>');
    }
    var limit = $('#paginator').val();

    /*$.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url')+'/api/site/login?token='+localStorage.getItem('token'),
        success: function(data, textStatus ){
          var countUser = Object.keys(data).length;
            //console.log(countUser);
            if(countUser == 0){
              window.location.href= "/schepisi/";
            }
            
        },
        error: function(xhr, textStatus, errorThrown){
           //$('#submitOrganization').text('Submit');
           console.log(errorThrown);

        }
    });*/

      $.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url') + '/api/organization?token='+localStorage.getItem('token'),
        success: function(data, textStatus ){
            $.each(data.message, function(key, value){
                $('#drpdownOrg').append('<option value='+value.organization_id+' id='+value.organization_id+'>'+value.organization_name+'</option>');
                $('#drpdownOrg1').append('<option value='+value.organization_id+' id='+value.organization_id+'>'+value.organization_name+'</option>');
                $('#drpdownOrg2').append('<option value='+value.organization_id+' id='+value.organization_id+'>'+value.organization_name+'</option>');
                $('#drpdownOrg3').append('<option value='+value.organization_id+' id='+value.organization_id+'>'+value.organization_name+'</option>');
            })
            
        },
        error: function(xhr, textStatus, errorThrown){
           console.log(errorThrown);

        }
      });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            url: localStorage.getItem('url')
        },

        url: 'getData.php',
        success: function(data, textStatus ){
            //console.log(data);
            $('#data-table').append(data);
            //$('#orgCount').append(data);
            $('#drpdownOrg').append(data);
            $('#editModal #drpdownOrg').append(data);
            $('#drpdownOrg1').append(data);
            $('#drpdownOrg2').append(data);
            $('#drpdownOrg3').append(data);
            if(localStorage.getItem('role') != 'administrator'){
                var filter = localStorage.getItem('orgName');
            $("#data-table").find( '#orgName:not(:contains("' + filter + '"))' ).parent('tr').remove();
            }
            $('table.orgTable').DataTable(); 
            
        },
        error: function(xhr, textStatus, errorThrown){
           //$('#submitOrganization').text('Submit');
           console.log(errorThrown);

        }
    });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            //url: window.location.pathname,
            url: localStorage.getItem('url'),
            role: localStorage.getItem('role'),
            user: localStorage.getItem('username')
        },

        url: 'getUsers.php',
        success: function(data, textStatus ){
            //console.log(data);
            var userSearch = localStorage.getItem('username');
            $('#userData').append(data);
            //$('#userCount').append(data);

            if(localStorage.getItem('role') != 'administrator' && localStorage.getItem('role') != 'standard' ){
                $("#userData").find( '#userName:not(:contains("' + userSearch + '"))' ).parent('tr').remove();
            }
            else if(localStorage.getItem('role') == 'standard'){
                $("#userData").find( '#userOrg:not(:contains("' + localStorage.getItem('orgName') + '"))' ).parent('tr').remove();
            }

            if(localStorage.getItem('role') == 'basic' || localStorage.getItem('role') == 'standard'){
              $('#history').remove(); 
              $('.userTable').remove();              
              $('.userInfo').append(data);
              $(".userInfo").find( 'h5:not(:contains("' + userSearch + '"))' ).remove();
              
            }
            else{
              $('table.usersTable').DataTable(); 
            }
            //console.log(userResult);
            
        },

        error: function(xhr, textStatus, errorThrown){

        }
    });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            type: 'chargers_and_credit',
            url: localStorage.getItem('url')
        },

        url: 'getTransactions.php',
        success: function(data, textStatus ){
            $('#chargers_and_credit-table').append(data);
            $('table.chargersTable').DataTable();
            //console.log($('#chargers_and_credit-table > tr').length);
            
        },
        error: function(xhr, textStatus, errorThrown){
           console.log(errorThrown);

        }
    });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            type: 'call_and_usage',
            url: localStorage.getItem('url')
        },

        url: 'getTransactions.php',
        success: function(data, textStatus ){
            //console.log(data);
            $('#call-and-usage-table').append(data);
            $('table.usageTable').DataTable();
        },
        error: function(xhr, textStatus, errorThrown){
           console.log(errorThrown);

        }
    });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            type: 'service_and_equipment',
            url: localStorage.getItem('url')
        },

        url: 'getTransactions.php',
        success: function(data, textStatus ){
            //console.log(data);
            $('#service-and-equipment-table').append(data);
            $('table.serviceTable').DataTable();

        },
        error: function(xhr, textStatus, errorThrown){
           console.log(errorThrown);

        }
    });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            type: 'all',
            url: localStorage.getItem('url')
        },

        url: 'getTransactions.php',
        //url: localStorage.getItem("url")+'/web/web_portal_be/api/transaction?token='+localStorage.getItem('token')+'&type=',
        success: function(data, textStatus ){
            //console.log(data);      
               
            $('#allTransaction').append(data);
            $('table.allTransactionTable').DataTable(); 

        },
        error: function(xhr, textStatus, errorThrown){
           console.log(xhr);

        }
    });
    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token'),
            url: localStorage.getItem('url')
        },

        url: 'getCostCentre.php',
        success: function(data, textStatus ){
            //console.log(data);

            $('#cost-centre-data').append(data);

            $('#cost-centre-data').find('.caret').click(function(){
            if($(this).siblings().hasClass('active')){
            $(this).siblings().removeClass('active');
            $(this).closest('.caret').removeClass('caret-down');
            }
            else{
              $(this).siblings().addClass('active');
              $(this).closest('.caret').addClass('caret-down');
            }
            })
            //$('#service-and-equipment-table').append(data);
        },
        error: function(xhr, textStatus, errorThrown){
           //$('#submitOrganization').text('Submit');
           console.log(errorThrown);

        }
    });

    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token')
        },

        url: 'costCentreReport.php',
        success: function(data, textStatus ){
            //console.log(data);
        },
        error: function(xhr, textStatus, errorThrown){
           console.log(textStatus);

        }
    });
    /* upload history */
    $.ajax({
        type: 'POST',
        data:{
            token: localStorage.getItem('token')
        },

        url: 'historyData.php',
        success: function(data, textStatus ){ 
            $('#file_upload_history').append(data);
            $('table.historyTable').DataTable(); 
        },
        error: function(error ,xml){
           console.log(error);

        }
    });
    /* end upload history */

    if(localStorage.getItem('role') == 'basic' || localStorage.getItem('role') == 'standard'){
        $('#overview').remove();
    }
     if($('#userData tr').length < 9){
        $('.dataTables_paginate').remove();
    }

    $.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url') + '/api/user/count',
        success: function(data, textStatus ){ 
        $('#userCount').text(data.message.count);
            var monthArr = [];
            var userListArr = [];
            $.each(data.message.breakdown, function(key, value){
                //console.log(value.month);
                monthArr.push(value.month);
                userListArr.push(value.count);
               })
               //WidgetChart 2
                var ctx = document.getElementById("widgetChart2")
                if (ctx) {
                  ctx.height = 200;
                  var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                      labels: monthArr,
                      type: 'line',
                      datasets: [{
                        data: userListArr,
                        label: 'Registered users',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,.55)',
                      },]

                    },
                    options: {

                      maintainAspectRatio: false,
                      legend: {
                        display: false
                      },
                      responsive: true,
                      tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        intersect: false,
                      },
                      scales: {
                        xAxes: [{
                          gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                          },
                          ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                          }
                        }],
                        yAxes: [{
                          display: false,
                          ticks: {
                            display: false,
                          }
                        }]
                      },
                      title: {
                        display: false,
                      },
                      elements: {
                        line: {
                          tension: 0.00001,
                          borderWidth: 1
                        },
                        point: {
                          radius: 4,
                          hitRadius: 10,
                          hoverRadius: 4
                        }
                      }
                    }
                  });
                }
        },
        error: function(error ,xml){
        console.log(error);

        }
    });
    /* end user count */

    /*org count */
$.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url') + '/api/organization/count',
        success: function(data, textStatus ){ 
        $('#orgCount').text(data.message.count);
            var monthArr = [];
            var orgListArr = [];
            $.each(data.message.breakdown, function(key, value){
                //console.log(value.month);
                monthArr.push(value.month);
                orgListArr.push(value.count);
               })
               //WidgetChart 1
                var ctx = document.getElementById("widgetChart1");
                if (ctx) {
                  ctx.height = 130;
                  var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                      labels: monthArr,
                      type: 'line',
                      datasets: [{
                        data: orgListArr,
                        label: 'Dataset',
                        backgroundColor: 'rgba(255,255,255,.1)',
                        borderColor: 'rgba(255,255,255,.55)',
                      },]
                    },
                    options: {
                      maintainAspectRatio: true,
                      legend: {
                        display: false
                      },
                      layout: {
                        padding: {
                          left: 0,
                          right: 0,
                          top: 0,
                          bottom: 0
                        }
                      },
                      responsive: true,
                      scales: {
                        xAxes: [{
                          gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                          },
                          ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                          }
                        }],
                        yAxes: [{
                          display: false,
                          ticks: {
                            display: false,
                          }
                        }]
                      },
                      title: {
                        display: false,
                      },
                      elements: {
                        line: {
                          borderWidth: 0
                        },
                        point: {
                          radius: 0,
                          hitRadius: 10,
                          hoverRadius: 4
                        }
                      }
                    }
                  });
                }
        },
        error: function(error ,xml){
        console.log(error);

        }
    });
    /*end org count */
    /*get notifications */
    $.ajax({
        type: 'GET',
        data:{
            token: localStorage.getItem('token')
        },

        url: localStorage.getItem('url') + '/api/file_histories/notifications',
        success: function(data, textStatus ){
            $('#notification-count').text('You have ' + data.message.length + ' new uploads'); 
            $('.quantity').text(data.message.length);

            $.each(data.message, function(key, value){
               $('#notif-list').append('<div class="email__item"><div class="content"><h5>Uploaded By: '+value.uploaded_by+'</h5><p>Uploaded Type: '+value.type+'</p><p>Uploaded Date: '+value.date_uploaded+'</p></div></div>');
             })

            
        },
        error: function(xhr, textStatus, errorThrown){
           console.log(errorThrown);

        }
    });
    /*end get notification */
    $(document).on('click', '#btn-history', function() {
      if($(this).siblings().hasClass('active')){
        $(this).siblings().removeClass('active');
      }
      else{
        $(this).siblings().addClass('active');
      }
      
    });
    $('#accounts').click(function(){
    })
}           
function uploadBtn(){

$('#uploadChargers').click(function(){
    var drpDown = $('#drpdownOrg1').val();

    if(drpDown == '0'){
        return false;
    }
    else{
            $.ajax({
                type: 'POST',
                data:{
                    json: $('#jsonOutput').text(),
                    type: 'chargers_and_credit',
                    organization_id: drpDown,
                    limit: '10',
                    token: localStorage.getItem('token')
                },

                url: localStorage.getItem('url') + '/api/transaction',
                beforeSend: function( textStatus ) {
                    $('#uploadChargers').text('');
                    $('#uploadChargers').html('Uploading <i class="fa fa-spinner fa-pulse"></i>');

                },
                success: function(data, textStatus ){                        
                    alert('Upload has been successfully completed!');
                    $.ajax({
                        type: 'POST',
                        data:{
                            type: 'chargers_and_credit',
                            limit: '10',
                            token: localStorage.getItem('token')
                        },

                        url: 'getTransactions.php',
                        success: function(data, textStatus ){                                
                            $('#chargers_and_credit-table').empty();
                            $('#chargers_and_credit-table').prepend(data);
                            $('#uploadChargers').text('Upload');
                        },
                        error: function(xhr, textStatus, errorThrown){
                           $('#uploadChargers').text('Upload');

                        }
                    })

                },
                error: function(error ,xml){
                   console.log(error);

                }
            });
        }    
    })
            $('#uploadCall').click(function(){
                var drpDown = $('#drpdownOrg2').val();

                if(drpDown == '0'){
                    return false;
                }
                else{
                    $.ajax({
                            type: 'POST',
                            data:{
                                json: $('#jsonOutput').text(),                                
                                type: 'call_and_usage',
                                organization_id: drpDown,
                                limit: '10',
                                token: localStorage.getItem('token')
                            },

                            url: localStorage.getItem('url') + '/api/transaction',
                            beforeSend: function( textStatus ) {
                               $('#uploadCall').html('Uploading <i class="fa fa-spinner fa-pulse"></i>');

                            },
                            success: function(data, textStatus ){                        
                                alert('Upload has been successfully completed!');
                                $.ajax({
                                    type: 'POST',
                                    data:{
                                        type: 'call_and_usage',
                                        limit: '10',
                                        token: localStorage.getItem('token')
                                    },

                                    url: 'getTransactions.php',
                                    success: function(data, textStatus ){
                                       
                                        $('##call_and_usage-table').empty();
                                        $('##call_and_usage-table').prepend(data);
                                        $('#uploadCall').text('Upload');
                                    },
                                    error: function(xhr, textStatus, errorThrown){
                                       $('#uploadCall').text('Upload');

                                    }
                                })

                            },
                            error: function(error ,xml){
                               console.log(error);

                            }
                        });  
                }

                
            })
            $('#uploadService').click(function(){
                 var drpDown = $('#drpdownOrg3').val();

                if(drpDown == '0'){
                    return false;
                }
                else{
                    $.ajax({
                        type: 'POST',
                        data:{
                            json: $('#jsonOutput').text(),
                            type: 'service_and_equipment',
                            organization_id: drpDown,
                            limit: '10',
                            token: localStorage.getItem('token')
                        },

                        url: localStorage.getItem('url') + '/api/transaction',
                        beforeSend: function( textStatus ) {
                           $('#uploadService').html('Uploading <i class="fa fa-spinner fa-pulse"></i>');

                        },
                        success: function(data, textStatus ){                        
                            alert('Upload has been successfully completed!');
                            $.ajax({
                                type: 'POST',
                                data:{
                                    type: 'service_and_equipment',
                                    limit: '10',
                                    token: localStorage.getItem('token')
                                },

                                url: 'getTransactions.php',
                                success: function(data, textStatus ){
                                    
                                    $('#service-and-equipment-table').empty();
                                    $('#service-and-equipment-table').prepend(data);
                                    $('#uploadService').text('Upload');
                                    $('table.serviceTable').DataTable(); 
                                },
                                error: function(xhr, textStatus, errorThrown){
                                   $('#uploadService').text('Upload');
                                   console.log(xhr + "," + textStatus +"," +errorThrown)

                                }
                            })
                        },
                        error: function(error ,xml){
                           console.log(error);

                        }
                    });
                }
                
            })

$('.navbar-sidebar').find('li a').click(function(){

$("body").addClass("animsition");
})

if($('.example1 tbody > tr').length < 10){
$('#example1_paginate').remove();
}
 


}
