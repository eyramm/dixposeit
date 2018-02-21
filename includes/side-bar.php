<?php
    $active_page = basename($_SERVER['PHP_SELF'], ".php");

    $user_id = $_SESSION['user_id'];

    $query = $db->query("SELECT * FROM users WHERE id = '$user_id' ");
    $user = mysqli_fetch_assoc($query);
?>
	<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$user['first_name']." ".$user['last_name']." ".$user['other_names'] ?></div>
                    <div class="email"><?=$user['email']?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li> -->
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?= (($active_page =='index')?'active':'') ;?>">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="<?= (($active_page == 'customers')?'active':'') ;?>">
                        <a href="customers.php">
                            <i class="material-icons">person</i>
                            <span>Customers</span>
                        </a>
                    </li>

                    <li class="<?= (($active_page =='drivers')?'active':'') ;?>">
                        <a href="drivers.php">
                            <i class="material-icons">local_taxi</i>
                            <span>Drivers</span>
                        </a>
                    </li>

                    <li class="<?= (($active_page =='trucks')?'active':'') ;?>">
                        <a href="trucks.php">
                            <i class="material-icons">local_shipping</i>
                            <span>Trucks</span>
                        </a>
                    </li>

                    <li class="<?= (($active_page =='sectors')?'active':'') ;?>">
                        <a href="sectors.php">
                            <i class="material-icons">map</i>
                            <span>Sectors</span>
                        </a>
                    </li>
                    
                    
                    <li class="header">MORE</li>
                    <li class="<?= (($active_page =='schedules')?'active':'') ;?>">
                        <a href="schedules.php">
                            <i class="material-icons">schedule</i>
                            <span>Schedules</span>
                        </a>
                    </li>

                    <li class="<?= (($active_page =='reports')?'active':'') ;?>">
                        <a href="reports.php">
                            <i class="material-icons">info_outline</i>
                            <span>Reports</span>
                        </a>
                    </li>

                    <li class="<?= (($active_page =='settings')?'active':'') ;?>">
                        <a href="settings.php">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?= date('Y'); ?> <a href="javascript:void(0);">DiXpose</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>