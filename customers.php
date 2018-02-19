<?php

require_once 'core/init.php';
include 'helpers/helpers.php';
if(!is_logged_in()){
	header('location: login.php');
}

$title = 'Customers';

include 'includes/header.php';
//include 'includes/preloader.php';
include 'includes/navigation.php';
include 'includes/side-bar.php';

$supervisor_id = $_SESSION['user_id'];

$sectors = $db->query("SELECT * FROM sectors WHERE supervisor_id = '$supervisor_id' ");

?>

    
    


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CUSTOMERS</h2>
            </div>

            <!-- Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Customers
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable customers_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact Info</th>
                                            <th>Location</th>
                                            <th>
                                            	<select name="sector_id" id="sector_id" class=" form-control show-tick" data-live-search="true" title="Choose sector...">
                                            		<?php foreach($sectors as $sector): ?>
                                            			<option><?=$sector['name']?></option>
                                            		<?php endforeach;?>
                                            	</select>
                                            </th>
                                            <th>Last Served</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Emmanuel Fache</td>
                                            <td>000000000</td>
                                            <td>accra</td>
                                            <td>NH</td>
                                            <td>2011/04/25</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Table -->
        </div>
    </section>



   



<?php include 'includes/footer.php'; ?>

<!-- Jquery DataTable Plugin Js -->
<script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="assets/js/project/customers.js"></script>