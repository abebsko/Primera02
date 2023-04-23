<?php
include "config.php";
include "session.php";
include "functions.php";
$user = getUser();
$case = getCase();
$hearings = getHearings();
$tasks = getTasks();
$lhDate = getLastHearingDate();
//call delete hearing function
if (isset($_GET['delHearing']) && isset($_GET['case'])) {
    deleteHearing();
}
//call create hearing function
if (isset($_POST['createHearing'])) {
    createHearing();
}
//call create task function
if (isset($_POST['newTask'])) {
    newTask();
}
//call delete task function
if (isset($_GET['delTask'])) {
    deleteTask();
}
if (isset($_GET['delApp'])) {
    deleteApp();
}

if (isset($_GET['delDoc'])) {
    deleteDoc();
}
// call mark complete function
if (isset($_GET['complete'])) {
    markComplete();
}

//call mark pending function
if (isset($_GET['pending'])) {
    markPending();
}
//call new application function
if (isset($_POST['newApp'])) {
    newApplication();
}
//call update app function
if (isset($_POST['updateApp'])) {
    updateApp();
}
//call new doc function
if (isset($_POST['newDoc'])) {
    newDocument();
}
//call download function docId
if (isset($_GET['docId'])) {
    downloadDoc();
}
//call delete order function
if (isset($_GET['delOrder'])) {
    deleteOrder();
}
//call new order function
if (isset($_POST['newOrder'])) {
    newOrder();
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <!-- <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all"> -->
    <!-- <link href="vendor/wow/animate.css" rel="stylesheet" media="all"> -->
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <!-- <link href="vendor/slick/slick.css" rel="stylesheet" media="all"> -->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <!-- <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all"> -->

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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?php echo $case['title'] ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="proceedings-tab" data-toggle="tab"
                                                    href="#proceedings" role="tab" aria-controls="proceedings"
                                                    aria-selected="false">Proceedings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes"
                                                    role="tab" aria-controls="notes" aria-selected="false">Case
                                                    Notes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tasks-tab" data-toggle="tab" href="#tasks"
                                                    role="tab" aria-controls="tasks" aria-selected="false">Tasks</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="applications-tab" data-toggle="tab"
                                                    href="#applications" role="tab" aria-controls="tasks"
                                                    aria-selected="false">Applications</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="documents-tab" data-toggle="tab"
                                                    href="#documents" role="tab" aria-controls="documents"
                                                    aria-selected="false">Documents</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders"
                                                    role="tab" aria-controls="orders" aria-selected="false">Orders</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" id="time-tab" data-toggle="tab" href="#time"
                                                    role="tab" aria-controls="time" aria-selected="false">Time Sheet</a>
                                            </li> -->
                                        </ul>
                                        <!-- All tabs Content -->
                                        <div class="tab-content pl-3 p-1" id="myTabContent">
                                            <!-- Details Content -->
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="table-responsive m-t-40">
                                                            <table class="table table-bordered table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="40%">Suit Number</th>
                                                                        <td> <?php echo $case['suitNo'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Judge</th>
                                                                        <td> <?php echo $case['judge'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Court</th>
                                                                        <td> <?php echo $case['court'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Client</th>
                                                                        <td> <?php echo $case['client'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Next Hearing Date</th>
                                                                        <td> <?php echo date('d-m-Y', strtotime($lhDate['nextHearingDate'])); ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card m-t-40">
                                                            <div class="card-header">
                                                                <h5> Facts of the Case</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>
                                                                    <?php echo $case['caseSummary'] ?></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Details Content -->
                                            <!-- Record Proceedings -->
                                            <div class="tab-pane fade" id="proceedings" role="tabpanel"
                                                aria-labelledby="proceedings-tab">
                                                <!-- For Case Manager Only and if Case is Open-->
                                                <?php
                                                if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-data__tool m-t-40">
                                                                <div class="table-data__tool-right">
                                                                    <button type="button"
                                                                        class="au-btn au-btn-icon au-btn--blue au-btn--small"
                                                                        data-toggle="modal" data-target="#scrollmodal">
                                                                        <i class="zmdi zmdi-plus"></i>New Record</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-data3">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Last Hearing Date</th>
                                                                        <th>Next Hearing Date</th>
                                                                        <th>Stage of Next Hearing</th>
                                                                        <th>Date Posted</th>
                                                                        <!-- for manager only -->
                                                                        <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                            <th></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    //display hearings                                                                   
                                                                    $sN = 0; // initialize for serial no
                                                                    foreach ($hearings as $hearing) {
                                                                        $hid = $hearing['hearingId'];
                                                                        $lHr = $hearing['lastHearingDate'];
                                                                        $nHR = $hearing["nextHearingDate"];
                                                                        $stage = $hearing["stageOfNextHearing"];
                                                                        $date = $hearing["datePosted"];
                                                                        $sN++;
                                                                        ?>

                                                                        <tr>
                                                                            <td><?php echo $sN ?></td>
                                                                            <td><?php echo date('d-m-Y', strtotime($lHr)); ?>
                                                                            </td>
                                                                            <td><?php echo date('d-m-Y', strtotime($nHR)); ?>
                                                                            </td>
                                                                            <td><?php echo $stage ?></td>
                                                                            <td><?php echo date('d-m-Y', strtotime($date)) ?>
                                                                            </td>
                                                                            <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                                <td><a href="case.php?case=<?php echo $case['matterId']; ?>&delHearing=<?php echo $hid; ?>"
                                                                                        onclick='return confirm("Are you sure you want to delete?")'>
                                                                                        <button class="btn btn-danger btn-sm"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top" title="Delete">
                                                                                            <i class="zmdi zmdi-delete"></i>
                                                                                        </button> </a></td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Record Proceedings -->
                                            <!-- Case Notes -->
                                            <div class="tab-pane fade" id="notes" role="tabpanel"
                                                aria-labelledby="notes-tab">
                                                <div class="row my-5">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <div class="table table-bordered table-striped">
                                                                <table>
                                                                    <tbody>
                                                                        <?php
                                                                        //display hearing notes                            
                                                                        foreach ($hearings as $hearing) {
                                                                            $lHr = $hearing['lastHearingDate'];
                                                                            $note = $hearing['notes'];
                                                                            ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <h4><?php echo date("j F, Y", strtotime($lHr)) ?>
                                                                                    </h4>
                                                                                    <p><?php echo $note ?></p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                            </tr>

                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Case Notes End -->
                                            <!-- Tasks Begin -->
                                            <div class="tab-pane fade" id="tasks" role="tabpanel"
                                                aria-labelledby="tasks-tab">
                                                <!-- For Case Manager Only and if Case is Open-->
                                                <?php
                                                if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col-md-3 offset-9">
                                                            <div class="table-data__tool m-t-20">
                                                                <div class="table-data__tool-right">
                                                                    <button type="button"
                                                                        class="au-btn au-btn-icon au-btn--blue au-btn--small"
                                                                        data-toggle="modal" data-target="#taskmodal">
                                                                        <i class="zmdi zmdi-plus"></i>New Task</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <div class="row m-b-40">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <h4> PENDING</h4>
                                                            <!-- <button class= "btn btn-secondary" onclick = "togglePending()">
                                                             <i class="fa fa-angle-down"></i>
                                                            PENDING</button>                                                        -->

                                                        </div>
                                                        <div class="table-responsive m-t-20">
                                                            <table class="table table-borderless table-data3"
                                                                id="pending">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date Created</th>
                                                                        <th>Subject</th>
                                                                        <th>Description</th>
                                                                        <th>Due Date</th>
                                                                        <th></th>
                                                                        <!-- for manager only -->
                                                                        <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                            <th></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    //display hearings                                                                 
                                                                    
                                                                    foreach ($tasks as $task) {
                                                                        $tid = $task['taskId'];
                                                                        $subject = $task['taskName'];
                                                                        $dateC = $task["dateAdded"];
                                                                        $desc = $task['details'];
                                                                        $due = $task['dueDate'];
                                                                        $status = $task['taskStatus'];
                                                                        if ($status == 1) {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo date('d-m-Y', strtotime($dateC)); ?>
                                                                                </td>
                                                                                <td><?php echo $subject ?></td>
                                                                                <td><?php echo $desc ?></td>
                                                                                <td><?php echo date('d-m-Y', strtotime($due)); ?>
                                                                                </td>
                                                                                <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                                    <td><a
                                                                                            href="case.php?case=<?php echo $case['matterId']; ?>&complete=<?php echo $tid ?>">
                                                                                            <button class="btn btn-secondary btn-sm"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Mark Complete">
                                                                                                <i class="zmdi zmdi-check"></i>
                                                                                            </button></a></td>
                                                                                    <td>
                                                                                        <a href="case.php?case=<?php echo $case['matterId']; ?>&delTask=<?php echo $tid; ?>"
                                                                                            onclick='return confirm("Are you sure you want to delete?")'>
                                                                                            <button class="btn btn-danger btn-sm"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top" title="Delete">
                                                                                                <i class="zmdi zmdi-delete"></i>
                                                                                            </button> </a>
                                                                                    </td>
                                                                                <?php } ?>
                                                                            </tr>
                                                                        <?php }
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Pending Table Ends -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <h4> COMPLETED</h4>
                                                            <!-- <button class= "btn btn-secondary" onclick = "toggleCompleted()">
                                                             <i class="fa fa-angle-down"></i> 
                                                             COMPLETED </button> -->
                                                        </div>
                                                        <div class="table-responsive m-t-20">
                                                            <table class="table table-borderless table-data3"
                                                                id="completed">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date Created</th>
                                                                        <th>Subject</th>
                                                                        <th>Description</th>
                                                                        <th>Date Completed</th>
                                                                        <th></th>
                                                                        <!-- for manager only -->
                                                                        <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                            <th></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    //display tasks                                                           
                                                                    foreach ($tasks as $task) {
                                                                        $tid = $task['taskId'];
                                                                        $subject = $task['taskName'];
                                                                        $dateC = $task["dateAdded"];
                                                                        $desc = $task['details'];
                                                                        $complete = $task['dateCompleted'];
                                                                        $status = $task['taskStatus'];
                                                                        if ($status == 0) {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo date('d-m-Y', strtotime($dateC)); ?>
                                                                                </td>
                                                                                <td><?php echo $subject ?></td>
                                                                                <td><?php echo $desc ?></td>
                                                                                <td><?php echo date('d-m-Y', strtotime($complete)); ?>
                                                                                </td>
                                                                                <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                                    <td>
                                                                                        <a
                                                                                            href="case.php?case=<?php echo $case['matterId']; ?>&pending=<?php echo $tid ?>">
                                                                                            <button class="btn btn-secondary btn-sm"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Mark Pending">
                                                                                                <i
                                                                                                    class="zmdi zmdi-check-circle"></i>
                                                                                            </button></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="case.php?case=<?php echo $case['matterId']; ?>&delTask=<?php echo $tid; ?>"
                                                                                            onclick='return confirm("Are you sure you want to delete?")'>
                                                                                            <button class="btn btn-danger btn-sm"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top" title="Delete">
                                                                                                <i class="zmdi zmdi-delete"></i>
                                                                                            </button> </a>
                                                                                    </td>


                                                                                <?php } ?>
                                                                            </tr>
                                                                        <?php }
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Completed Ends -->
                                            </div>
                                            <!-- Tasks end -->
                                            <!-- Applications -->
                                            <div class="tab-pane fade" id="applications" role="tabpanel"
                                                aria-labelledby="applications-tab">
                                                <!-- For Case Manager Only and if Case is Open-->
                                                <?php
                                                if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-data__tool m-t-40">
                                                                <div class="table-data__tool-right">
                                                                    <button type="button"
                                                                        class="au-btn au-btn-icon au-btn--blue au-btn--small"
                                                                        data-toggle="modal" data-target="#appmodal">
                                                                        <i class="zmdi zmdi-plus"></i>New
                                                                        Application</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-data3">
                                                                <thead>
                                                                    <tr>
                                                                        <!-- <th>#</th> -->
                                                                        <th>Application</th>
                                                                        <th>Filed By</th>
                                                                        <th>Date Filed</th>
                                                                        <th>Progress</th>
                                                                        <th>Last Updated</th>
                                                                        <!-- for manager only -->
                                                                        <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                            <th></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    //display applications                                                                   
                                                                    
                                                                    $apps = getApplications();
                                                                    foreach ($apps as $app) {
                                                                        $aid = $app['appId'];
                                                                        $appName = $app['appName'];
                                                                        $filedBy = $app['filedBy'];
                                                                        $dateFiled = $app['dateFiled'];
                                                                        $progress = $app['progress'];
                                                                        $lastUpdate = $app['lastUpdate'];

                                                                        ?>

                                                                        <tr>
                                                                            <td><?php echo $appName ?></td>
                                                                            <td><?php echo $filedBy ?></td>
                                                                            <td><?php echo date('d-m-Y', strtotime($dateFiled)); ?>
                                                                            </td>
                                                                            <td class="process"><?php echo $progress ?></td>
                                                                            <td><?php echo date('d-m-Y', strtotime($lastUpdate)); ?>
                                                                            </td>
                                                                            <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                                <td>
                                                                                    <a
                                                                                        href="editApp.php?case=<?php echo $case['matterId']; ?>&app=<?php echo $aid; ?>">
                                                                                        <button class="btn btn-secondary btn-sm"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top" title="Update">
                                                                                            <i class="zmdi zmdi-edit"></i>
                                                                                        </button> </a>
                                                                                    <a href="case.php?case=<?php echo $case['matterId']; ?>&delApp=<?php echo $aid; ?>"
                                                                                        onclick='return confirm("Are you sure you want to delete?")'>
                                                                                        <button class="btn btn-danger btn-sm"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top" title="Delete">
                                                                                            <i class="zmdi zmdi-delete"></i>
                                                                                        </button> </a>
                                                                                </td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Applications -->
                                            <!-- Documents -->
                                            <div class="tab-pane fade" id="documents" role="tabpanel"
                                                aria-labelledby="documents-tab">
                                                <!-- For Case Manager Only and if Case is Open-->
                                                <?php
                                                if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-data__tool m-t-40">
                                                                <div class="table-data__tool-right">
                                                                    <button type="button"
                                                                        class="au-btn au-btn-icon au-btn--blue au-btn--small"
                                                                        data-toggle="modal" data-target="#docmodal">
                                                                        <i class="zmdi zmdi-upload"></i>Upload
                                                                        Document</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-data3">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Document</th>
                                                                        <th>Description</th>
                                                                        <th>Date Filed/Received</th>
                                                                        <!-- for manager only -->
                                                                        <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                            <th></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    //display documents                                                                   
                                                                    $sN = 0; // initialize for serial no
                                                                    $docs = getDocs();
                                                                    foreach ($docs as $doc) {
                                                                        $dId = $doc['docId'];
                                                                        $fileName = $doc['fileName'];
                                                                        $docDesc = $doc['docDesc'];
                                                                        $dateFiled = $doc['dateFiled'];
                                                                        $sN++;
                                                                        if ($case['matterId'] == $doc['matterId']) {
                                                                            ?>

                                                                            <tr>
                                                                                <td><?php echo $sN ?></td>
                                                                                <td><?php echo $fileName ?></td>
                                                                                <td><?php echo $docDesc ?></td>
                                                                                <td><?php echo date('d-m-Y', strtotime($dateFiled)); ?>
                                                                                </td>
                                                                                <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                                    <td>
                                                                                        <a
                                                                                            href="case.php?case=<?php echo $case['matterId']; ?>&docId=<?php echo $dId; ?>">
                                                                                            <button class="btn btn-primary btn-sm"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="Download">
                                                                                                <i class="zmdi zmdi-download"></i>
                                                                                            </button> </a>
                                                                                        <a href="case.php?case=<?php echo $case['matterId']; ?>&delDoc=<?php echo $dId; ?>&filename=<?php echo $fileName; ?>"
                                                                                            onclick='return confirm("Are you sure you want to delete?")'>
                                                                                            <button class="btn btn-danger btn-sm"
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="top" title="Delete">
                                                                                                <i class="zmdi zmdi-delete"></i>
                                                                                            </button> </a>
                                                                                    </td>
                                                                                <?php }
                                                                        } ?>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Documents -->
                                            <!-- Orders -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel"
                                                aria-labelledby="orders-tab">
                                                <!-- For Case Manager Only and if Case is Open-->
                                                <?php
                                                if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="table-data__tool m-t-40">
                                                                <div class="table-data__tool-right">
                                                                    <button type="button"
                                                                        class="au-btn au-btn-icon au-btn--blue au-btn--small"
                                                                        data-toggle="modal" data-target="#ordersmodal">
                                                                        <i class="zmdi zmdi-plus"></i>New Record</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-data3">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Date Delivered</th>
                                                                        <th>Description</th>
                                                                        <!-- for manager only -->
                                                                        <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                            <th></th>
                                                                        <?php } ?>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    //display documents                                                                   
                                                                    $sN = 0; // initialize for serial no
                                                                    $orders = getOrders();
                                                                    foreach ($orders as $order) {
                                                                        $oId = $order['orderId'];
                                                                        $orderDesc = $order['orderDesc'];
                                                                        $dateDelivered = $order['dateDelivered'];

                                                                        $sN++;

                                                                        ?>

                                                                        <tr>
                                                                            <td><?php echo $sN ?></td>
                                                                            <td><?php echo date('d-m-Y', strtotime($dateDelivered)); ?>
                                                                            </td>
                                                                            <td><?php echo $orderDesc ?></td>
                                                                            <?php if ($user['id'] == $case['manager'] && $case['matterStatus'] == 1) { ?>
                                                                                <td>
                                                                                    <a href="case.php?case=<?php echo $case['matterId']; ?>&delOrder=<?php echo $oId; ?>"
                                                                                        onclick='return confirm("Are you sure you want to delete?")'>
                                                                                        <button class="btn btn-danger btn-sm"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top" title="Delete">
                                                                                            <i class="zmdi zmdi-delete"></i>
                                                                                        </button> </a>
                                                                                </td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Orders -->
                                        </div>
                                        <!-- End All Tabs -->

                                    </div>
                                </div>
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
            <!-- END MAIN CONTENT-->
            <!-- modal New Proceeding -->
            <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scrollmodalLabel">Add New Record of Proceeding</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="case.php?case=<?php echo $case['matterId'] ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="suitNo" class=" form-control-label">Suit
                                            No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <h5 class="form-control-static"><?php echo $case['suitNo'] ?></h5>
                                        <!-- <input type="text" id="text-input" name="suitNo" class="form-control"> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="lhearingDate" class=" form-control-label">Last Hearing Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <!-- <input type="date" id="date-input" name="lhDate" class="form-control" Required
                                            value=""> -->
                                        <input type="text" id="text-input" name="lhDate" class="form-control" Required
                                            value="<?php echo date('d-m-Y', strtotime($lhDate['nextHearingDate'])); ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nhearingDate" class=" form-control-label">Next Hearing
                                            Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date-input" name="nhearingDate" class="form-control"
                                            Required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="stage" class=" form-control-label">Stage of Next Hearing</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="stage" class="form-control" Required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="notes" class=" form-control-label"> Hearing Note</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="note" id="textarea-input" rows="9"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <!-- hidden input to identify case -->
                                <input type="hidden" name="signpost" value="<?php echo $case['matterId']; ?>">
                                <input type="submit" value="Submit" name="createHearing" class="btn btn-primary">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal scroll -->
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
                            <form action="case.php?case=<?php echo $case['matterId'] ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="suitNo" class=" form-control-label">Suit
                                            No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <h5 class="form-control-static"><?php echo $case['suitNo'] ?></h5>
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
                                        <input type="date" id="date-input" name="due" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="desc" class=" form-control-label"> Details</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="desc" id="textarea-input" rows="9"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <!-- hidden input to identify case -->
                                <input type="hidden" name="case" value="<?php echo $case['matterId']; ?>">
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
            <!-- Applications Modal -->
            <div class="modal fade" id="appmodal" tabindex="-1" role="dialog" aria-labelledby="appmodalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="appmodalLabel">Add New Application</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="case.php?case=<?php echo $case['matterId'] ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="suitNo" class=" form-control-label">Suit
                                            No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <h5 class="form-control-static"><?php echo $case['suitNo'] ?></h5>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="appName" class=" form-control-label">Application Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="appName" class="form-control" Required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="filedBy" class=" form-control-label">Filed By</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="filedBy" class="form-control" Required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="dateFiled" class=" form-control-label">Date Filed</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date-input" name="dateFiled" class="form-control"
                                            Required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="status" class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="status" class="form-control">
                                    </div>
                                </div>
                                <!-- hidden input to identify case -->
                                <input type="hidden" name="case" value="<?php echo $case['matterId']; ?>">
                                <input type="submit" value="Submit" name="newApp" class="btn btn-primary">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end applications modal -->
            <!-- Documents Modal -->
            <div class="modal fade" id="docmodal" tabindex="-1" role="dialog" aria-labelledby="docmodalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="appmodalLabel">Upload New Document</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="case.php?case=<?php echo $case['matterId'] ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="suitNo" class=" form-control-label">Suit
                                            No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <h5 class="form-control-static"><?php echo $case['suitNo'] ?></h5>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="appName" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="docDesc" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="filedBy" class=" form-control-label">File Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="file" class="form-control" Required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="dateFiled" class=" form-control-label">Date Filed</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date-input" name="dateFiled" class="form-control"
                                            Required>
                                    </div>
                                </div>
                                <!-- hidden input to identify case -->
                                <input type="hidden" name="case" value="<?php echo $case['matterId']; ?>">
                                <input type="submit" value="Submit" name="newDoc" class="btn btn-primary">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end documents modal -->
            <!-- orders Modal -->
            <div class="modal fade" id="ordersmodal" tabindex="-1" role="dialog" aria-labelledby="ordersmodalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ordersmodalLabel">New Order Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="case.php?case=<?php echo $case['matterId'] ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="suitNo" class=" form-control-label">Suit
                                            No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <h5 class="form-control-static"><?php echo $case['suitNo'] ?></h5>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="dateFiled" class=" form-control-label">Date Delivered</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date-input" name="dateDelivered" class="form-control"
                                            Required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="synopsis" class=" form-control-label">Synopsis</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="orderDesc" id="textarea-input" rows="9" class="form-control"
                                            Required></textarea>
                                    </div>
                                </div>

                                <!-- hidden input to identify case -->
                                <input type="hidden" name="case" value="<?php echo $case['matterId']; ?>">
                                <input type="submit" value="Submit" name="newOrder" class="btn btn-primary">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end documents modal -->
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
    <!-- <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script> -->
    <script src="vendor/animsition/animsition.min.js"></script>
    <!-- <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script> -->
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->