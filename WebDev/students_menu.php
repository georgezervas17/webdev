<!DOCTYPE html>
<?php session_start(); 
    //if($_SESSION["username"]==null)
?>
<?php if(!empty($_SESSION["username"])){ ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META HTTP-EQUIV="refresh" CONTENT="10">

        <title>WebDev - Students Menu</title>
        <link rel="icon" href="img/trasp.png">

        <meta name="description" content="Your Description Here">
        <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
        <meta name="author" content="ThemeForces.Com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="./fbapp/fb.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div id="tf-service" style="background-color: #d6d6c2" >
            <?php
            $_SESSION["path"]= "students_menu.php" ;
            echo "Καλώς ήρθες ".$_SESSION["username"];
            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";

            $conn = new mysqli($servername, $username,'', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $username=$_SESSION["username"];
            $sql = "SELECT folder,projectID FROM users,projects WHERE username='$username' AND (username=student1 OR username=student2)";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION["folder"]=$row["folder"];
                    $_SESSION["projectID"]=$row["projectID"];
                }
            }
            $conn->close();
            if (!empty($_POST["file_handler"])){
                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";

                $conn = new mysqli($servername, $username,'', $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $username=$_SESSION["username"];
                $sql = "SELECT folder FROM users,projects WHERE username='$username' AND username=student1 ";
                $_SESSION["file"]=mysqli_query($conn, $sql);
            }
            ?>

            <div class="container">
                <div class="content" style="text-align: center">

                    <ul style="list-style-type:none; align-content:center;">
                        <h3 style="font-size:45px;">Dashboard Φοιτητή</h3>
                        <br>
                        <li>
                            <input class="button5"  style="width:300px;" type="submit" data-toggle="collapse" data-target="#demo1" value="Όλες οι διπλωματικές"> 
                            <div class="col-md-12" style="padding:2%; zoom:80%;">
                                <div id="demo1" class="collapse">

                                    <form id="search_project" action="all_projects.php" method="post">
                                        Δώσε κριτήριο αναζήτησης:<br>
                                        <input style="font-size:20px;" type="text" size="20" name="search"> 
                                        <br></br>
                                        <input name="ready" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Αναζήτησε">
                                        <input name="showall" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Εμφάνισέ τα όλα">
                                    </form>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <form id="search_project" action="all_projects.php" method="post">
                                <input name="showapplications" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Εμφάνισε τις αιτήσεις μου">
                            </form>
                        </li>
                        <br>
                        <li>
                            <form id="chat" action="chat.php" method="post">
                                <input name="chat" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Πλατφόρμα επικοινωνίας">
                            </form>
                        </li>

                        <br>                        
                        <li>
                            <form id="file_handler" action="file_handler.php" method="post">
                                <input name="folder" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Ανέβασμα αρχείων για διπλωματική">
                            </form>
                        </li>
                        <br>                        
                        <li>
                            <form id="profile" action="profile.php" method="get">
                                <input name="userprofile" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="<?php echo $_SESSION["username"]?>">
                            </form>
                        </li>
                        <br>    
                        <li><button class="button5" onclick="location.href = 'index.php';" style=" width:300px; vertical-align:middle">Charts</button></li>
                        <br> 
                         <li>
                            <form id="file_handler" action="Logout.php" method="post">
                                <input name="folder" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Logout">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>





        </div>


    </body>
</html>
<?php }else{
 header("Location:index.php");
}
?>

