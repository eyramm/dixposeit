$(function () {
	var user_id = $('#user_id').val();
	load_data();

  	function load_data(is_sector){
  		var dataTable = $('#trucks_table').DataTable({
  			"responsive": true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "helpers/fetch_trucks.php",
				type: "POST",
				data: {user_id:user_id}
			},
			"columnDefs": [
				{
					"target": [0],
					"orderable": false
				}
			],
			"pageLength": 10
		});
  	}

  	$('#truck_form').submit(function(event){
		event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: 'helpers/action.php',
			method: 'POST',
			data: form_data,
			success: function(response){
				if(response == '1'){
					$('#truck_form')[0].reset();
					$('#myModal').modal('hide');
					swal("Success!", "New truck added!", "success");
					$('#trucks_table').DataTable().destroy();
					load_data();
				}else{
					$('#myModal').modal('hide');
					swal("Error!", "Something went wrong!", "error");
				}					

				
			}
		});
		
	});


});

