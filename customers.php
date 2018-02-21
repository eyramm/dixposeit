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

$bin_types = $db->query("SELECT * FROM bins");

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
                                <span class="pull-right"><button class="btn btn-danger waves-effect"data-toggle="modal" data-target="#myModal">Add New Customer</button></span>
                            </h2>
                             <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Add New Customer</a></li>
                                    </ul>
                                </li>
                            </ul> -->                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable customers_table" id="customers_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact Info</th>
                                            <th>Location</th>
                                            <th>
                                            	<select name="sector" id="sector" class=" form-control show-tick" data-live-search="true" title="Sector">
                                            		<option value="">View All</option>
                                            		<?php foreach($sectors as $sector): ?>
                                            			<option value="<?=$sector['id']?>"><?=$sector['name']?></option>
                                            		<?php endforeach;?>
                                            	</select>
                                            </th>
                                            <th>Last Served</th>
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
            	<form action="" method="post" id="customer_form">
	                <div class="modal-dialog modal-lg" role="document">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <h4 class="modal-title" id="modal-title">Add Customer</h4>
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
	                                            <input type="text" class="form-control" placeholder="Secondary phone number" name="phone_no_2" id="phone_no_2"/>
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
	                            		<label class="form-label">Location</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Area" name="physical_address" id="physical_address"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <select class="form-control show-tick" data-live-search="true" title="-- Service Sector --" name="sector_id" id="sector_id" required="">
			                                    <?php foreach($sectors as $sector): ?>
                                            		<option value="<?=$sector['id']?>"><?=$sector['name']?></option>
                                            	<?php endforeach;?>
			                                </select>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Street Name" name="street_name" id="street_name"/>
	                                        </div>
	                                    </div>
	                                </div>

	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <select class="form-control show-tick" data-live-search="true" title="-- Classification --">
			                                        <!-- <?php foreach($bin_types as $bin_type): ?>
                                            			<option value="<?=$bin_type['id']?>"><?=$bin_type['type']?></option>
                                            		<?php endforeach;?> -->
			                                    </select>
	                                    </div>
	                                </div>

	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Ghana Post GPS Address" name="address_tag" id="address_tag"/>
	                                        </div>
	                                    </div>
	                                </div>

                            	</div>

                            	<div class="row clearfix">
	                            	<div class="col-sm-12">
	                            		<label class="form-label">Service Terms</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <select class="form-control show-tick" data-live-search="true" title="-- Bin Types --">
			                                        <?php foreach($bin_types as $bin_type): ?>
                                            			<option value="<?=$bin_type['id']?>"><?=$bin_type['type']?></option>
                                            		<?php endforeach;?>
			                                    </select>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="number" class="form-control" placeholder="Number of Bins" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Weekly Collection Frequency" />
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Service charge/pick up" />
	                                        </div>
	                                    </div>
	                                </div>
                            	</div>

	                        </div>
	                        <div class="modal-footer">
	                        	<input type="hidden" name="customer_id" id="customer_id">
	                        	<input type="hidden" name="action" id="action" value="add_customer">
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
<script src="assets/js/project/customers.js"></script>