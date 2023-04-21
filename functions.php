<?php
// Getters
function getUser()
{
    global $db;
    global $id;
    $userSql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($db, $userSql);
    mysqli_stmt_bind_param($stmt, "i", $param_user);
    $param_user = $id;
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
    }
    $user = mysqli_fetch_array($result);
    return $user;
}

function getMatters()
{
    global $db;
    $caseSql = "SELECT * FROM matters M LEFT OUTER JOIN users U ON M.manager = U.id";
    $caseSqlResult = mysqli_query($db, $caseSql);
    $cases = mysqli_fetch_all($caseSqlResult, MYSQLI_ASSOC);
    return $cases;
}

function getAllUsers()
{
    global $db;
    $getUsers = "SELECT * FROM users";
    $getUsersResult = mysqli_query($db, $getUsers);
    $allUsers = mysqli_fetch_all($getUsersResult, MYSQLI_ASSOC);
    return $allUsers;
}

//get each case

function getCase()
{
    global $db;
    if (isset($_GET['case'])) {
        $caseid = $_GET['case'];
        $getCase = "SELECT * FROM matters M LEFT OUTER JOIN users U ON M.manager = U.id WHERE matterId= '$caseid'";
        $caseResult = mysqli_query($db, $getCase);
        $case = mysqli_fetch_array($caseResult);
    }
    return $case;
}

//getHearings
function getHearings()
{
    global $db;
    $caseid = $_GET['case'];
    $sql = "SELECT * FROM hearings  WHERE matterId= '$caseid' ORDER BY datePosted DESC";
    $sqlResult = mysqli_query($db, $sql);
    $hearings = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    return $hearings;
}

function getLastHearingDate()
{
    global $db;
    $caseid = $_GET['case'];
    // get last record of nexthearingdate
    $sql = "SELECT nextHearingDate FROM hearings  WHERE matterId= '$caseid' ORDER BY nextHearingDate DESC LIMIT 1";
    $sqlResult = mysqli_query($db, $sql);
    $lhDate = mysqli_fetch_array($sqlResult);
    return $lhDate;

}

function getTasks()
{
    global $db;
    $caseid = $_GET['case'];
    $sql = "SELECT * FROM tasks  WHERE matterId= '$caseid' ORDER BY dateAdded DESC";
    $sqlResult = mysqli_query($db, $sql);
    $tasks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    return $tasks;
}

function getUserTasks()
{
    global $db;
    global $id;
    $sql = " SELECT m.matterId,title,taskId,taskName,dueDate,taskStatus FROM matters m, tasks t WHERE m.matterId = t.matterId and m.manager= '$id' ORDER BY dateAdded DESC";
    $sqlResult = mysqli_query($db, $sql);
    $tasks = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    return $tasks;

}
function getDocs()
{
    global $db;
    $sql = " SELECT * FROM documents order by dateFiled DESC";
    $sqlResult = mysqli_query($db, $sql);
    $docs = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    return $docs;
}
function getApplications()
{
    global $db;
    $caseid = $_GET['case'];
    $sql = "SELECT * FROM applications  WHERE matterId= '$caseid' ORDER BY dateFiled DESC";
    $sqlResult = mysqli_query($db, $sql);
    $apps = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    return $apps;


}
function getOrders()
{
    global $db;
    $caseid = $_GET['case'];
    $sql = " SELECT * FROM orders  WHERE matterId= '$caseid' order by dateDelivered DESC";
    $sqlResult = mysqli_query($db, $sql);
    $orders = mysqli_fetch_all($sqlResult, MYSQLI_ASSOC);
    return $orders;
}
//Setters
function createCase()
{
    global $db;
    $matterId = $_POST["suitNo"];
    $caseTitle = $_POST["title"];
    $manager = $_POST["manager"];
    $court = $_POST["court"];
    $judge = $_POST["judge"];
    $category = $_POST["category"];
    $caseSummary = $_POST["caseSummary"];
    $client = $_POST["client"];
    $nHr = $_POST["hearingDate"];
    $stage = $_POST["hearingStage"];

    //check if matter is already registered.  
    $checkCase = "SELECT matterId FROM matters WHERE matterId= '$matterId'";
    $checkCaseResult = mysqli_query($db, $checkCase);
    if (mysqli_num_rows($checkCaseResult) > 0) {
        echo "<script> alert('$matterId already exists') </script>";
    } else {
        //create new case and insert into two tables in one query
        $insertCase = "INSERT INTO matters (matterId,title,manager,judge,court,caseSummary,client,category) 
        VALUES('$matterId','$caseTitle','$manager','$judge', '$court','$caseSummary','$client','$category'); INSERT INTO hearings (matterId,nextHearingDate,stageOfNextHearing) VALUES('$matterId','$nHr','$stage');";
        if (mysqli_multi_query($db, $insertCase)) {
            header("Location: matters.php");
        } else {
            echo "<script> alert('Failed to Create New Matter') </script>";
        }
    }
    return;
}
function createHearing()
{
    global $db;
    $matterId = $_POST["signpost"];
    $note = $_POST["note"];
    $lHr = $_POST["lhDate"];
    $nHr = $_POST["nhearingDate"];
    $stage = $_POST["stage"];

    //create new hearing
    $insert = "INSERT INTO hearings (matterId,lastHearingDate,nextHearingDate,stageOfNextHearing,notes) 
        VALUES('$matterId',' $lHr','$nHr','$stage',' $note')";
    if (mysqli_query($db, $insert)) {
        // header("Location: case.php?case=$matterId");
    } else {
        echo "<script> alert('Failed') </script>";
    }

    return;
}

function newTask()
{
    global $db;
    $matterId = $_POST["case"];
    $subject = $_POST["subject"];
    $due = $_POST["due"];
    $desc = $_POST["desc"];

    //create new task
    $sql = "INSERT INTO tasks (matterId,taskName,details,dueDate) VALUES('$matterId','$subject','$desc','$due')";
    if (mysqli_query($db, $sql)) {
        //header("Location: case.php?case=$matterId");
    } else {
        echo "<script> alert('Failed') </script>";
    }

    return;
}
//Create New User Function
function newUser()
{
    global $db;
    // Validate username
    // Prepare a select statement
    if (isset($_POST['username'])) {
        $getUsers = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($db, $getUsers)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    echo "<script> alert('This username is already taken.') </script>";
                    // $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "<script> alert('Oops! Something went wrong. Please try again later.') </script>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

    }


    // Validate password
    if (strlen(trim($_POST["password1"])) < 6 || strlen(trim($_POST["password1"])) > 12) {
        echo "<script> alert('Password must be between 6 and 12 characters.') </script>";
        // $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password1"]);
    }

    // Validate confirm password
    $confirm_password = trim($_POST["password2"]);
    if ($password != $confirm_password) {
        echo "<script> alert('Password did not match.') </script>";
        $confirmErr = "true";
    }


    if (isset($username) && isset($password) && empty($confirmErr)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password ,name, role) VALUES (?,?,?,?)";

        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_username, $param_password, $param_name, $param_role);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $_POST['name'];
            $param_role = $_POST['role'];



            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: userData.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    return;
}

function newApplication()
{
    global $db;
    $matterId = $_POST["case"];
    $appName = $_POST["appName"];
    $filedBy = $_POST["filedBy"];
    $dateFiled = $_POST["dateFiled"];
    $status = $_POST["status"];

    //create new task
    $sql = "INSERT INTO applications (matterId,appName,filedBy,dateFiled,progress) VALUES('$matterId','$appName','$filedBy','$dateFiled','$status')";
    if (mysqli_query($db, $sql)) {
        //header("Location: case.php?case=$matterId");
    } else {
        echo "<script> alert('Failed') </script>";
    }

    return;

}

function newOrder()
{
    global $db;
    $matterId = $_POST["case"];
    $desc = $_POST["orderDesc"];
    $dateDelivered = $_POST["dateDelivered"];

    //create new task
    $sql = "INSERT INTO orders (matterId,orderDesc,dateDelivered) VALUES('$matterId','$desc','$dateDelivered')";
    if (mysqli_query($db, $sql)) {
        //header("Location: case.php?case=$matterId");
    } else {
        echo "<script> alert('Failed') </script>";
    }

    return;

}

//new Document upload
function newDocument()
{
    global $db;
    $matterId = $_POST["case"];
    $docDesc = $_POST["docDesc"];
    $dateFiled = $_POST["dateFiled"];

    //file upload
    $filename = $_FILES["file"]["name"]; //name of uploaded file
    $temp = $_FILES["file"]["tmp_name"]; //temporary uploads directory 
    $size = $_FILES['file']['size'];
    $dir = "uploads/" . $filename; //destination on the server

    //get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "<script> alert('File extension must be .zip, .pdf or .docx') </script>";
    } elseif ($size > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "<script> alert('File too large!') </script>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($temp, $dir)) {
            $sql = "INSERT INTO documents (matterId,docDesc,dateFiled,fileName) VALUES ('$matterId','$docDesc','$dateFiled','$filename')";
            if (mysqli_query($db, $sql)) {
                // header("Location: case.php?case=$matterId");
            }
        } else {
            echo "Failed to upload file.";
        }
    }

}


//updaters 
function editCase()
{
    global $db;
    $caseid = $_POST["signpost"]; //old value
    $matterId = $_POST["suitNo"]; //new value
    $caseTitle = $_POST["title"];
    $manager = $_POST["manager"];
    $court = $_POST["court"];
    $judge = $_POST["judge"];
    $category = $_POST["category"];
    $client = $_POST["client"];
    $caseSummary = $_POST["caseSummary"];

    $updatesql = "UPDATE matters SET matterId = '$matterId',title = '$caseTitle', manager = '$manager', court = '$court', judge = '$judge', category = '$category', caseSummary = '$caseSummary', client = '$client' WHERE matterId = '$caseid'";
    $query = mysqli_query($db, $updatesql);
    if ($query) {
        header("Location:matters.php");
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
}

function updateApp()
{
    global $db;
    $matterId = $_GET["case"];
    $aId = $_POST['app'];
    $status = $_POST['status']; //or die(mysqli_error($db))

    $updatesql = "UPDATE applications SET progress = '$status' WHERE appId = '$aId'";
    $query = mysqli_query($db, $updatesql);
    if ($query) {
        header("Location:case.php?case=$matterId");
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
}

//delete matters 
function deleteMattter()
{
    global $db;
    $delete = $_GET['delMatter'];
    $deleteQuery = "DELETE from matters WHERE matterId= '$delete'";
    $deleteQueryResult = mysqli_query($db, $deleteQuery);

    if ($deleteQueryResult) {
        header("Location: matters.php");
        //  echo "<script> window.open('matters.php?deleted=matter has been deleted','_self') </script>";  
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
    exit();
    // return;
}

//delete users 
function deleteUser()
{
    global $db;
    $delUser = $_GET['delUser'];
    $delUserQuery = "DELETE from users WHERE id= '$delUser'";
    $delUserQueryResult = mysqli_query($db, $delUserQuery);

    if ($delUserQueryResult) {
        header("Location: userData.php");
        //  echo "<script> window.open('matters.php?deleted=matter has been deleted','_self') </script>";  
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
    exit();
}

function deleteHearing()
{
    global $db;
    $caseid = $_GET['case'];
    $hid = $_GET['delHearing'];
    $deleteQuery = "DELETE from hearings WHERE hearingId= '$hid'";
    $deleteQueryResult = mysqli_query($db, $deleteQuery);

    if ($deleteQueryResult) {
        //header("Location: case.php?case=$caseid");
        //  echo "<script> window.open('matters.php?deleted=matter has been deleted','_self') </script>";  
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
    exit();
    // return;
}

function deleteTask()
{
    global $db;
    $caseid = $_GET['case'];
    $tid = $_GET['delTask'];
    $deleteQuery = "DELETE from tasks WHERE taskId= '$tid'";
    $deleteQueryResult = mysqli_query($db, $deleteQuery);

    if ($deleteQueryResult) {
        header("Location: case.php?case=$caseid");
        //  echo "<script> window.open('matters.php?deleted=matter has been deleted','_self') </script>";  
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
    exit();
    // return;
}

function deleteApp()
{
    global $db;
    $caseid = $_GET['case'];
    $aid = $_GET['delApp'];
    $deleteQuery = "DELETE from applications WHERE appId = '$aid'";
    $deleteQueryResult = mysqli_query($db, $deleteQuery);
    if ($deleteQueryResult) {
        header("Location: case.php?case=$caseid");
        //  echo "<script> window.open('matters.php?deleted=matter has been deleted','_self') </script>";  
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
    exit();
    // return;
}

function deleteDoc()
{
    global $db;
    $caseid = $_GET['case'];
    $dId = $_GET['delDoc'];
    $filename = $_GET['filename'];
    $dir = 'uploads/'; //delete file from database and folder in server
    if (unlink($dir . $filename)) {
        $deleteQuery = "DELETE from documents WHERE docId = '$dId'";
        mysqli_query($db, $deleteQuery);
        header("Location: case.php?case=$caseid");
    } else {
        echo "<script> alert('Unsuccessful')</script>";

    }
}
function deleteOrder()
{
    global $db;
    $caseid = $_GET['case'];
    $oId = $_GET['delOrder'];

    $deleteQuery = "DELETE from orders WHERE orderId = '$oId '";
    if (mysqli_query($db, $deleteQuery)) {
        header("Location: case.php?case=$caseid");
    } else {
        echo "<script> alert('Unsuccessful')</script>";

    }
}

//close a case
function closeCase()
{
    global $db;
    $caseid = $_GET['caseClose'];
    $sql = "UPDATE matters SET matterStatus = 0 WHERE matterId = '$caseid'";
    $stmt = mysqli_query($db, $sql);
    if ($stmt) {
        header("Location: matters.php");
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
}

function openCase()
{
    global $db;
    $caseid = $_GET['caseOpen'];
    $sql = "UPDATE matters SET matterStatus = 1 WHERE matterId = '$caseid'";
    $stmt = mysqli_query($db, $sql);
    if ($stmt) {
        header("Location: matters.php");
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
}

function markComplete()
{
    global $db;
    $caseid = $_GET['case'];
    $tid = $_GET['complete'];
    $sql = "UPDATE tasks SET taskStatus = 0, dateCompleted = CURRENT_TIMESTAMP() WHERE taskId = '$tid'";
    $stmt = mysqli_query($db, $sql);
    if ($stmt) {
        header("Location:case.php?case=$caseid");
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
}

function markPending()
{
    global $db;
    $caseid = $_GET['case'];
    $tid = $_GET['pending'];
    $sql = "UPDATE tasks SET taskStatus = 1 WHERE taskId = '$tid'";
    $stmt = mysqli_query($db, $sql);
    if ($stmt) {
        header("Location:case.php?case=$caseid");
    } else {
        echo "<script> alert('Unsuccessful')</script>";
    }
}

function downloadDoc()
{
    global $db;
    $dId = $_GET['docId'];

    // fetch file to download from database
    $sql = "SELECT * FROM documents WHERE docId=$dId";
    $result = mysqli_query($db, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['fileName'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);
    }

}

//GET COUNT OF open MATTERS BY CATEGORIES 
function getCategoriesCount()
{
    global $db;
    //get count of each category 
    $sql = "SELECT category, COUNT(category) AS count FROM matters WHERE matterStatus= 1 GROUP BY category";
    $result = mysqli_query($db, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $categories;

}
//GET COUNT OF open MATTERS BY MANAGER 
function getManagerCount()
{
    global $db;
    $sql = "SELECT name, COUNT(matterId) AS count FROM matters m, users u WHERE m.manager = u.id AND matterStatus= 1 GROUP BY name";
    $result = mysqli_query($db, $sql);
    $managers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $managers;
}

// get all court attendance dates per case manager
function fetchDates()
{
    global $db;
    global $id;
    $sql = "SELECT title, nextHearingDate as start FROM hearings h, matters m where m.matterId = h.matterId and m.manager = '$id'";
    // $sql1 = "SELECT dueDate from tasks";
    $result = mysqli_query($db, $sql);
    $dates = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $dates;
}
// get all task due dates per user
function fetchDueDates()
{
    global $db;
    global $id;
    $sql = "SELECT taskName as title, dueDate as start FROM tasks t, matters m where m.matterId = t.matterId and m.manager = '$id' and taskStatus = 1";
    $result = mysqli_query($db, $sql);
    $dueDates = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $dueDates;
}
?>