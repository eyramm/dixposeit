$(function () {
    $('#login').click(function(){
    	var username = $('#username').val();
		var password = $('#password').val();
		var action = 'login';

		if(username !='' || password !=''){
				$.ajax({
					url: "helpers/action.php",
					method: "POST",
					data: {action: action, username: username, password: password},
					success: function(data){
						if(data == '0'){
							$.notify({
								title: '<strong>Error! </strong>',
								message: 'Invalid login details.'
							},
							{
								type: 'danger',
								animate: 
								{
									enter: 'animated bounceIn',
									exit: 'animated bounceOut'
								},
								placement: {
									from: 'top',
									align: 'right'
								}

							});
						}else{
							window.location.href = 'index.php';
						}
					}
				});
			}else{
				$.notify({
					title: '<strong>Error! </strong>',
					message: 'Please fill in all fields.'
				},
				{
					type: 'danger',
					animate: 
					{
						enter: 'animated bounceIn',
						exit: 'animated bounceOut'
					},
					placement: {
						from: 'top',
						align: 'right'
					}

				});
			}
    });
});