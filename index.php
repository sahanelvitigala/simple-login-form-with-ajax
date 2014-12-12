<!doctype html>
<html>

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900' rel='stylesheet' type='text/css'>
<link href="css/main-style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
 </head>    
 

</head>
<body>


    <div class="container ">
        <div class="row">
              <form class="form-signin" role="form" id="login_form" name="login_form" method="post" action="#">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="u_name" name="u_name" class="form-control" placeholder="Username" required autofocus>
                <label for="pwd" class="sr-only">Password</label>
                <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              </form>
        </div>
    </div> <!-- /container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.1.min.js"></script>    
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.min.js"></script> 


<script>
$(document).ready(function(e) {
	
        var validator =$('#login_form').validate({
        rules: {
			u_name: {
				required: true
			},
			pwd: {
				required: true
			}	
		},
        messages: {
            u_name: {
                required: 'Please enter Username'
            },
            pwd: {
                required: 'Please enter your Password'
            }
        },
		highlight: function (element) {
			
			 jQuery(element).closest('.form-group').addClass('has-error');
		},

		unhighlight: function(element) {
             jQuery(element).closest('.form-group').removeClass('has-error');
            
			 
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },  
        submitHandler: function (form) {
                   var ajax_data = {
                       u_name:$("#u_name").val(),
                       pwd:$("#pwd").val(),
					   ajax_status:'form_submit'
                    };   



                   $.ajax({
                          url: 'login_check.php',
                           //data: jQuery(form).serialize(),
                          data:ajax_data,
                            type: 'POST',
                            success: function (data) {
                                console.log(data);
                                jQuery("#btn_form_submit").attr("disabled", false);
                                //alert("submit successfully.....");
								if(data=="ok"){
									location.href = "user-details.php";	
								}else{
									alert("Please Try Again");	
								}
                            },
                            error: function (data) {
                               // console.log(data);
                            } 
                    });//ajax
                     return false; //

             
         }//form
        
    });//form validate
	
	
});
</script>
</body>
</html>