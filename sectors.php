<?php

require_once 'core/init.php';
include 'helpers/helpers.php';
if(!is_logged_in()){
	header('location: login.php');
}

$title = 'Sectors';

include 'includes/header.php';
//include 'includes/preloader.php';
include 'includes/navigation.php';
include 'includes/side-bar.php';

$supervisor_id = $_SESSION['user_id'];

$electoral_areas = $db->query("SELECT * FROM electoral_areas ");


?>

    
    


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SECTORS</h2>
            </div>

            <!-- Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List of Sectors
                                <span class="pull-right"><button class="btn btn-danger waves-effect" data-toggle="modal" data-target="#myModal">Add New Sector</button></span>
                            </h2>                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable sectors_table" id="sectors_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Geographical Boundry</th>
                                            <th>Number of Customers</th>
                                            <th>Overall Performance</th>
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
            	<form action="" method="post" id="sector_form">
	                <div class="modal-dialog modal-lg" role="document">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <h4 class="modal-title" id="modal-title">Add Sector</h4>
	                        </div>
	                        <div class="modal-body">
	                            <div class="row clearfix">
	                            	<div class="col-sm-12">
	                            		<label class="form-label">Sector</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <select class="form-control show-tick" data-live-search="true" title="-- Electoral Area --" name="electoral_area_id" id="electoral_area_id" required="">
				                                    <?php foreach($electoral_areas as $electoral_area): ?>
	                                            		<option value="<?=$electoral_area['id']?>"><?=$electoral_area['name']?></option>
	                                            	<?php endforeach;?>
			                                	</select>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Name" name="name" id="name"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="Region" name="region" id="region"/>
	                                        </div>
	                                    </div>
	                                </div>
                            	</div>

                            	<div class="row clearfix">
	                            	<div class="col-sm-12">
	                            		<label class="form-label">Geographical Boundry</label>
	                            	</div>
	                                <div class="col-sm-4">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="text" class="form-control" placeholder="There will be a map here" name="reg_no" id="reg_no"/>
	                                        </div>
	                                    </div>
	                                </div>
	                                
                            	</div>

                            	

	                        </div>
	                        <div class="modal-footer">
	                        	<input type="hidden" name="sector_id" id="sector_id">
	                        	<input type="hidden" name="action" id="action" value="add_sector">
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
<script src="assets/js/project/sectors.js"></script>