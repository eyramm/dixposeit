$(function () {
	var user_id = $('#user_id').val();
	load_data();

  	function load_data(is_sector){
  		// var dataTable = $('#customers_table').DataTable({
  		// 	"responsive": true,
  		// 	"processing": true,
  		// 	"severSide": true,
  		// 	"order": [],
  		// 	"ajax":  {
  		// 		url: "helpers/fetch_customers.php",
  		// 		type: "POST",
  		// 		data: {is_sector:is_sector}
  		// 	},
  		// 	"columnDefs":[
  		// 		{
  		// 			"targets": [2],
  		// 			"orderable": false
  		// 		}
  		// 	],
  		// 	"pageLength": 10
  		// });


  		var dataTable = $('#customers_table').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "helpers/fetch_customers.php",
				type: "POST",
				data: {user_id:user_id}
			},
			"columnDefs": [
				{
					"target": [3],
					"orderable": false
				}
			],
			"pageLength": 10
		});
  	}
});

