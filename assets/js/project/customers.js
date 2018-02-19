$(function () {
    // $('.customers_table').DataTable({
    //     responsive: true
    // });
	load_data();
  	function load_data(is_sector){
  		var dataTable = $('.customers_table').DataTable({
  			responsive: true,
  			"processing": true,
  			"severSide": true,
  			"order": [],
  			"ajax":  {
  				url: "helpers/get_customers.php",
  				type: "POST",
  				data: {is_sector:is_sector}
  			},
  			"columnDefs":[
  				{
  					"targets": [2],
  					"orderable": false
  				}
  			],
  			"pageLength": 10
  		});
  	}
  	load_data();
});

