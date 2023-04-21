<?php
include "config.php";
include "session.php";
include "functions.php";
$user = getUser();
$cases = getMatters();

//get count of open and closed matters 
$open = 0;
$closed = 0;
$count = [];
foreach ($cases as $case) {
    if ($case['matterStatus'] == 1) {
        $open++;
    } else {
        $closed++;
    }
}
array_push($count, $open, $closed);

$categories = getCategoriesCount();
$managers = getManagerCount();


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
                            <a class="js-arrow" href="#">
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
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Open v. Closed Matters</h3>
                                        <canvas id="mybarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Matters by Categories</h3>
                                        <canvas id="catBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Matters by Team Members</h3>
                                        <canvas id="teamBarChart"></canvas>
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
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

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
    <script>
        // open&closed bar chart
        var ctx = document.getElementById('mybarChart');
        if (ctx) {
            var count = <?php echo json_encode($count); ?>

            var chartdata = {
                labels: ["open", "closed"],
                datasets: [
                    {
                        label: "No of Matters",
                        backgroundColor: ["rgba(200, 200, 200, 0.75)", '#7FBDFF'],
                        borderColor: ["rgba(200, 200, 200, 0.75)", "#7FBDFF"],
                        hoverBackgroundColor: ["rgba(200, 200, 200, 1)", "#7FBDFF"],
                        hoverBorderColor: ["rgba(200, 200, 200, 1)", "#7FBDFF"],
                        data: count,
                    },
                ],
            };



            var barGraph = new Chart(ctx, {
                type: "bar",
                data: chartdata,
                options: {
                    legend: {
                        position: "top",
                        labels: {
                            fontFamily: "Poppins",
                        },
                    },
                    scales: {
                        xAxes: [
                            {
                                ticks: {
                                    fontFamily: "Poppins",
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins",
                                },
                            },
                        ],
                    },
                },
            });
        }
        //Categories bar chart
        var categories = <?php echo json_encode($categories); ?>;
        category = [];
        num = [];
        for (var i in categories) {
            category.push(categories[i].category);
            num.push(categories[i].count);
        }

        var ctx2 = document.getElementById('catBarChart');
        if (ctx2) {

            var chartdata = {
                labels: category,
                datasets: [
                    {
                        label: "Categories",
                        backgroundColor: ["rgba(200, 200, 200, 0.75)", '#7FBDFF'],
                        borderColor: ["rgba(200, 200, 200, 0.75)", "#7FBDFF"],
                        hoverBackgroundColor: ["rgba(200, 200, 200, 1)", "#7FBDFF"],
                        hoverBorderColor: ["rgba(200, 200, 200, 1)", "#7FBDFF"],
                        data: num,
                    },
                ],
            };

            var barGraph = new Chart(ctx2, {
                type: "bar",
                data: chartdata,
                options: {
                    legend: {
                        position: "top",
                        labels: {
                            fontFamily: "Poppins",
                        },
                    },
                    scales: {
                        xAxes: [
                            {
                                ticks: {
                                    fontFamily: "Poppins",
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins",
                                },
                            },
                        ],
                    },
                },
            });
        }
        // Teams Bar Chart
        var managers = <?php echo json_encode($managers); ?>;
        var user = [];
        var number = [];
        for (var i in managers) {
            user.push(managers[i].name);
            number.push(managers[i].count);
        }

        var ctx3 = document.getElementById('teamBarChart');
        if (ctx3) {

            var chartdata = {
                labels: user,
                datasets: [
                    {
                        label: "Team Member",
                        backgroundColor: ["rgba(200, 200, 200, 0.75)", '#7FBDFF', '#3868CD'],
                        borderColor: ["rgba(200, 200, 200, 0.75)", "#7FBDFF", '#3868CD'],
                        hoverBackgroundColor: ["rgba(200, 200, 200, 1)", "#7FBDFF", '#3868CD'],
                        hoverBorderColor: ["rgba(200, 200, 200, 1)", "#7FBDFF", '#3868CD'],
                        data: number,
                    },
                ],
            };

            var barGraph = new Chart(ctx3, {
                type: "bar",
                data: chartdata,
                options: {
                    legend: {
                        position: "top",
                        labels: {
                            fontFamily: "Poppins",
                        },
                    },
                    scales: {
                        xAxes: [
                            {
                                ticks: {
                                    fontFamily: "Poppins",
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                    fontFamily: "Poppins",
                                },
                            },
                        ],
                    },
                },
            });
        }

    </script>
</body>

</html>
<!-- end document-->