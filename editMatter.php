<?php
include "config.php";
include "session.php";
include "functions.php";
// $user = getUser();
$case = getCase();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="au theme template" />
  <meta name="author" content="Hau Nguyen" />
  <meta name="keywords" content="au theme template" />

  <!-- Title Page-->
  <title>Create Matter</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all" />
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" />
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all" />

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all" />
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all" />
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" />
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all" />
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" />

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all" />
</head>

<body class="animsition">
  <div class="page-wrapper">
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 offset-3">
              <div class="card">
                <div class="card-header">
                  <strong>Edit Matter</strong>
                </div>
                <div class="card-body card-block">
                  <form action="matters.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="suitNo" class=" form-control-label">Suit
                          No</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="suitNo" class="form-control"
                          value="<?php echo $case['suitNo'] ?>">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="title" class=" form-control-label">Case
                          Title</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="title" class="form-control"
                          value="<?php echo $case['title'] ?>">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="client" class=" form-control-label">Client</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="client" class="form-control"
                          value="<?php echo $case['client'] ?>">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="court" class=" form-control-label">Court</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="court" class="form-control"
                          value="<?php echo $case['court'] ?>">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="judge" class=" form-control-label">Judge</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="judge" class="form-control"
                          value="<?php echo $case['judge'] ?>">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="category" class=" form-control-label">Category</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="category" class="form-control"
                          value="<?php echo $case['category'] ?>">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="Details" class=" form-control-label">Case
                          Summary</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <textarea name="caseSummary" id="textarea-input" rows="9" class="form-control"
                          value="<?php echo $case['caseSummary'] ?>"></textarea>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="assigned" class=" form-control-label">Case Manager
                        </label>
                      </div>
                      <div class="col-12 col-md-9">
                        <select name="manager" id="select" class="form-control">
                          <option value="<?php echo $case['manager'] ?>"><?php echo $case['name'] ?> </option>
                          <?php
                          //code to display users
                          $allUsers = getAllUsers();
                          foreach ($allUsers as $aUser) {
                            $uId = $aUser["id"];
                            $name = $aUser["name"];
                            if ($uId == $case['manager']) {
                              continue;
                            }
                            ?>
                            <option value="<?php echo $uId ?>"><?php echo $name ?></option>
                          <?php } ?>
                        </select>

                      </div>
                    </div>
                    <input type="hidden" name="signpost" value="<?php echo $case['matterId']; ?>">
                    <input type="submit" value="Submit" name="editCase" class="btn btn-primary btn-sm">
                    <a href="matters.php">
                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Cancel
                      </button></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js"></script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js"></script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>

  <!-- Main JS-->
  <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->