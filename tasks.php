<?php
include "config.php";
include "session.php";
include "functions.php";
$user = getUser();
$tasks = getUserTasks();
//call create task function
if (isset($_POST['newTask'])) {
    newTask();
}
// call mark complete function
if (isset($_GET['complete'])) {
    markComplete();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/primera.png" alt="Primera" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        <li>
                            <a href="matters.php">
                                <i class="fas fa-table"></i>Matters</a>
                        </li>
                        <li>
                            <a href="tasks.php">
                                <i class="fas fa-check-square"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="documents.php">
                                <i class="far fa-file"></i>Documents</a>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <!-- Admin View Only-->
                        <?php
                        if ($user['role'] == 0) { ?>
                            <li>
                                <a href="analytics.php">
                                    <i class="fas fa-chart-bar"></i>Analytics</a>
                            </li>
                            <li>
                                <a href="userData.php">
                                    <i class="fas fa-gear"></i>Admin</a>
                            </li>
                        <?php } ?>
                    </ul>                    
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="images/icon/primera.png" alt="Primera" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="matters.php">
                                <i class="fas fa-table"></i>Matters</a>
                        </li>
                        <li>
                            <a href="tasks.php">
                                <i class="fas fa-check-square"></i>Tasks</a>
                        </li>
                        <li>
                            <a href="documents.php">
                                <i class="far fa-file"></i>Documents</a>
                        </li>
                        <li>
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <!-- Admin View Only-->
                        <?php
                        if ($user['role'] == 0) { ?>
                            <li>
                                <a href="analytics.php">
                                    <i class="fas fa-chart-bar"></i>Analytics</a>
                            </li>
                            <li>
                                <a href="userData.php">
                                    <i class="fas fa-gear"></i>Admin</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $user['name'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $user['name'] ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $user['username'] ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="overview-wrap"> -->
                                <div class="col-md-3">
                                    <h2 class="title-1">MY TASKS</h2>
                                </div>
                                <div class="col-md-3 offset-9"><button class="au-btn au-btn-icon au-btn--blue"
                                        data-toggle="modal" data-target="#taskmodal">
                                        <i class="zmdi zmdi-plus"></i>add task</button> </div>

                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-md-12">
                                <div class="table-responsive">                                   
                                        <table class="table table-borderless table-striped table-data3">                                           
                                            <tbody>
                                                <?php
                                                foreach ($tasks as $task) {
                                                    if ($task['taskStatus'] == 1) {
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <h5 class="task"> <a
                                                                        href="case.php?case=<?php echo $task['matterId']; ?>"><?php echo $task['title']; ?></a></h5>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <?php echo $task['taskName']; ?>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="time"><?php echo date('d-m-Y', strtotime($task['dueDate'])); ?></span>
                                                            </td>
                                                            <td> <a
                                                                    href="tasks.php?case=<?php echo $task['matterId']; ?>&complete=<?php echo $task['taskId'] ?>">
                                                                    <button class="btn btn-success btn-sm" data-toggle="tooltip"
                                                                        data-placement="top" title="Mark Complete">
                                                                        <i class="zmdi zmdi-check-square"></i>
                                                                    </button></a> 
                                                                <a href="tasks.php?case=<?php echo $task['matterId'];
                                                                ; ?>&delTask=<?php echo $task['taskId'] ?>"
                                                                    onclick='return confirm("Are you sure you want to delete?")'>
                                                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                                        data-placement="top" title="Delete">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </button> </a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                        href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                           <!-- END MAIN CONTENT-->
        <!-- Task Modal -->
        <div class="modal fade" id="taskmodal" tabindex="-1" role="dialog" aria-labelledby="taskmodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskmodalLabel">Add New Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="tasks.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="suitNo" class=" form-control-label">Associated Matter</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="case" id="select" class="form-control" required>
                                        <option value="NULL">Select Case</option>
                                        <?php
                                        //code to call cases managed by user
                                        $cases = getMatters();
                                        foreach ($cases as $case) {
                                            $mId = $case["matterId"];
                                            $name = $case["title"];
                                            if ($case['manager'] == $user['id']) {
                                                ?>
                                                <option value="<?php echo $mId ?>"><?php echo $name ?></option>
                                            <?php }
                                        } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="subject" class=" form-control-label">Subject</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="subject" class="form-control" Required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="dueDate" class=" form-control-label">Due Date</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="date-input" name="due" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="desc" class=" form-control-label"> Details</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="desc" id="textarea-input" rows="9" class="form-control"></textarea>
                                </div>
                            </div>
                            <!-- hidden input to identify case
                            <input type="hidden" name="case" value="<?php echo $case['matterId']; ?>"> -->
                            <input type="submit" value="Submit" name="newTask" class="btn btn-primary">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary">Confirm</button>
                                                        </div> -->
                </div>
            </div>
        </div>
        <!-- end task modal -->
         </div>
         <!-- END PAGE CONTAINER-->
    </div>
<!-- END PAGE WRAPPER-->
    

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->