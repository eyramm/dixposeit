<?php

require_once 'core/init.php';
include 'helpers/helpers.php';
if(!is_logged_in()){
	header('location: login.php');
}

$title = 'Drivers';

include 'includes/header.php';
//include 'includes/preloader.php';
include 'includes/navigation.php';
include 'includes/side-bar.php';

$supervisor_id = $_SESSION['user_id'];

$sectors = $db->query("SELECT * FROM sectors WHERE supervisor_id = '$supervisor_id' ");
$classes = $db->query("SELECT * FROM driver_categories ");


?>

    
    


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DRIVERS</h2>
            </div>

            <!-- Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Drivers
                                <span class="pull-right"><button class="btn btn-danger waves-effect"data-toggle="modal" data-target="#myModal">Add New Driver</button></span>
                            </h2>                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable drivers_table" id="drivers_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact Info</th>
                                            <th>Driver License ID</th>
                                            <th>
                                            	<select name="sector" id="sector" class=" form-control show-tick" data-live-search="true" title="Assigned sector">
                                            		<option value="">View All</option>
                                            		<?php foreach($sectors as $sector): ?>
                                            			<option value="<?=$sector['id']?>"><?=$sector['name']?></option>
                                            		<?php endforeach;?>
                                            	</select>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Table -->
        </div>
    </section>



    		<!-- MODAL -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            	<form action="" method="post" id="driver_form">
	                <div class="modal-dialog modal-lg" role="document">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <h4 class="modal-title" id="modal-title">Add Driver</h4>
	                        </div>
	                        <div class="modal-body">
	                            <div class="row clearfix">
	                            	<div class="col-sm-12">
	                            		<label class="form-label">Name</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Other Names" name="other_names" id="other_names"/>
	                                        </div>
	                                    </div>
	                                </div>
                            	</div>

                            	<div class="row clearfix">
	                            	<div class="col-sm-12">
	                            		<label class="form-label">Contact</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Primary phone number" name="phone_no" id="phone_no"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Work phone number" name="phone_no_2" id="phone_no_2"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Email Address" name="email" id="email"/>
	                                        </div>
	                                    </div>
	                                </div>
                            	</div>

                            	<div class="row clearfix">
	                            	<div class="col-sm-12">
	                            		<label class="form-label">Driver's License</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Driver's License Number" name="license_id" id="license_id"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <select class="form-control show-tick" data-live-search="true" title="-- Driver Class --" name="class_id" id="class_id" required="">
			                                    <?php foreach($classes as $class): ?>
                                            		<option value="<?=$class['id']?>"><?=$class['class']?></option>
                                            	<?php endforeach;?>
			                                </select>
	                                    </div>
	                                </div>

	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <select class="form-control show-tick" data-live-search="true" title="-- Sector --" name="sector_id" id="sector_id" required="">
			                                    <?php foreach($sectors as $sector): ?>
                                            		<option value="<?=$sector['id']?>"><?=$sector['name']?></option>
                                            	<?php endforeach;?>
			                                </select>
	                                    </div>
	                                </div>
                            	</div>

	                        </div>
	                        <div class="modal-footer">
	                        	<input type="hidden" name="driver_id" id="driver_id">
	                        	<input type="hidden" name="action" id="action" value="add_driver">
	                        	<input type="submit" name="action_btn" id="action_btn" class="btn btn-info" value="SAVE">
	                        	<input type="hidden" name="supervisor_id" id="supervisor_id" value="<?=$_SESSION['user_id']?>">
	                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
	                        </div>
	                    </div>
	                </div>
            	</form>
            </div>



   


<input type="hidden" id="user_id" value="<?=$_SESSION['user_id']?>">
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
<script src="assets/js/project/drivers.js"></script>