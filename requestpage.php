<?php
if (isset($_POST['award'])) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "stulog";

    $con = mysqli_connect($hostname, $username, $password, $databaseName);

    $rollno = $_POST['rollno'];
    $act = $_POST['act'];
    $part = $_POST['part'];
    $cer = $_POST['cer'];
    $name = $_POST['name'];
    $sap = $_POST['sap'];
    $ap = $_POST['ap'];

    switch($act){
        case "Paper Presentation":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;

        case "Project Presentation":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }
            break;

        case "Techno Managerial Event*":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;
        
        case "Sports And Games":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;
        
        case "Membership":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;
        
        case "LeaderShip / Organizing Events":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }
            
            break;

        case "VAC / Online Courses":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;

        case "Project To Paper / Patent / Copyright":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;

        case "GATE / CAT / Govt exams":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;

        case "Placement & Internship":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;
        
        case "Entrepreneurship":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;

        case "Social Activity":
            if($part =="Inter clg"){
                if($cer == "Won"){
                    $sap += 20;

                }
                else{
                    $sap += 5;
                }
            }
            else{
                if($cer == "Won"){
                    $sap += 30;

                }
                else{
                    $sap += 10;


                }         
            
            }

            break;

        
    }

    $query = "UPDATE `stulog` SET `sap`='$sap', `ap`='$ap' WHERE `rollno`='$rollno'";
    mysqli_query($con, $query);  
}

$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='stulog';
$con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if (!$con) {
    die(mysqli_error($con));
}

$result = mysqli_query($con, "SELECT * FROM stulog WHERE ap = '0' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Images</title>
</head>
<body>
    <div class="container">
        <h1>Images from Database</h1>
        
        <div class="image-container">
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <form action="" method="POST">
                    <div><center>
                    <div class="image-item">
                        <h3>Name :<?php echo $row['name'];?></h3>
                        <h3>RollNo :<?php echo $row['rollno'];?></h3>
                        <h3>Date :<?php echo $row['date'];?></h3>
                        <h3>Activity :<?php echo $row['act'];?></h3>
                        <h3>Participated in:<?php echo $row['part'];?></h3>
                        <h3>Certificate of:<?php echo $row['cer'];?></h3>
                        <img src="imgup/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>" width="200">
                        <input type="hidden" name="rollno" value="<?php echo $row['rollno']; ?>">
                        <input type="hidden" name="act" value="<?php echo $row['act']; ?>">
                        <input type="hidden" name="part" value="<?php echo $row['part']; ?>">
                        <input type="hidden" name="cer" value="<?php echo $row['cer']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="sap" value="<?php echo $row['sap']; ?>">
                        <input type="hidden" name="ap" value="1"><br>
                        <input type="submit" name="award" value="award" class="btn btn-success m-3">
                        <button type="button" class="btn btn-danger m-3">reject</button>
                    </div></center>
                    </div>
                </form>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($con);
?>
