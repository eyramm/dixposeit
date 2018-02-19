$(function () {
	var user_id = $('#user_id').val();
	load_data();

  	function load_data(is_sector){
  		var dataTable = $('#customers_table').DataTable({
  			"responsive": true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "helpers/fetch_customers.php",
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

  	$(document).on('change', '#sector_id', function(){
  		var sector_id = $(this).val();
  		$('#customers_table').DataTable().destroy();
  		if (sector_id != '') {
  			load_data(sector_id);
  		}else
  		{
  			load_data();
  		}
  	})
});

