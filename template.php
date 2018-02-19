<?php

require_once 'core/init.php';
include 'helpers/helpers.php';
if(!is_logged_in()){
	header('location: login.php');
}

$title = 'Customers';

include 'includes/header.php';
include 'includes/preloader.php';
include 'includes/navigation.php';
include 'includes/side-bar.php';

?>

    
    


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CUSTOMERS</h2>
            </div>

            <!-- Table -->
            <div class="row clearfix">
                
            </div>
            <!-- #END# Table -->
        </div>
    </section>



    


<?php include 'includes/footer.php'; ?>

<!-- Custom Js -->
<script src="assets/js/project/customers.js"></script>
