$(function () {
	var user_id = $('#user_id').val();
	load_data();

  	function load_data(is_sector){
  		var dataTable = $('#drivers_table').DataTable({
  			"responsive": true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "helpers/fetch_drivers.php",
				type: "POST",
				data: {user_id:user_id, is_sector:is_sector}
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

  	$(document).on('change', '#sector', function(){
  		var sector_id = $(this).val();
  		$('#drivers_table').DataTable().destroy();
  		if (sector_id != '') {
  			load_data(sector_id);
  		}else
  		{
  			load_data();
  		}
  	});

  	$('#driver_form').submit(function(event){
		event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: 'helpers/action.php',
			method: 'POST',
			data: form_data,
			success: function(response){
				if(response == '1'){
					$('#driver_form')[0].reset();
					$('#myModal').modal('hide');
					swal("Success!", "New driver added!", "success");
					$('#drivers_table').DataTable().destroy();
					load_data();
				}else{
					$('#myModal').modal('hide');
					swal("Error!", "Something went wrong!", "error");
				}					

				
			}
		});
		
	});


});

