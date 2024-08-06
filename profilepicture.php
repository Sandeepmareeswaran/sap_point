<?php
if (isset($_POST['update'])) {
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
    $date = $_POST['date'];

    // Handle image upload
    if ($_FILES["img"]["error"] === 4) {
        echo "<script> alert('Image Does Not Exist');</script>";
    } else {
        
        $fileName = $_FILES["img"]["name"];
        $fileSize = $_FILES["img"]["size"];
        $tmpName = $_FILES["img"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid Image Extension');</script>";
        } else if ($fileSize > 1000000) {
            echo "<script> alert('Image Size Is Too large');</script>";
        } else {
            $newImageName = uniqid() . '-' . $imageExtension;
            move_uploaded_file($tmpName, 'imgup/' . $newImageName);

            // Fetch existing dates for the roll number
            $query = "SELECT dates FROM stulog WHERE rollno='$rollno'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $existingDates = $row['dates'];

            // Check for duplicate date
            if (strpos($existingDates, $date) !== false) {
                echo "Duplicates are strictly restricted";
            } else { 
                // Append new date to existing dates
                if (empty($existingDates)) {
                    $dates = $date;
                } else {
                    $dates = $existingDates . ", " . $date;
                }
                $query = "UPDATE stulog SET act='$act', part='$part', cer='$cer', img='$newImageName', name='$name', date='$date', dates='$dates', ap='0' WHERE rollno='$rollno'";
                mysqli_query($con, $query);
                echo "<script> alert('Successfully added')</script>";
            }
        }
    }
}
?>

   


<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
        function formValidation(){
            let x=document.forms["form1"]["rollno"].value;
            if (x==''){
                alert("rollno must be filled out");
                return false;
            }
            let y=document.forms["form1"]["act"].value;
            if (y==''){
                alert("Ativity must be filled out");
                return false;
            }
            let z=document.forms["form1"]["part"].value;
            if (z==''){
                alert("Participated must be filled out");
                return false;
            }
            let a=document.forms["form1"]["cer"].value;
            if (a==''){
                alert("Certificate must be filled out");
                return false;
            }
            let i=document.forms["form1"]["img"].value;
            if (i==''){
                alert("File must be filled out");
                return false;
            }
            let n=document.forms["form1"]["name"].value;
            if (i==''){
                alert("File must be filled out");
                return false;
            }
            let d=document.forms["form1"]["date"].value;
            if (i==''){
                alert("File must be filled out");
                return false;
            }
            
    }
    function newFunction(){
        document.getElementById("form1").reset();
    }
  </script>
    </head>
    <body>
        <div class = "contianer">
            <div class = "row">
                <div class = "col-12 form-container">
                    <div class = "d-flex flex-row justify-content-center">
                        <div>
                        <h1 class = "login-heading texted-login m-5 text-center">UPLOAD CERTIFICATE</h1>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data" name="form1" id="form1" onSubmit="return formValidation()" autocomplete="off">
                        <label for="rollno" class= "text-font">ROLLNO:</label>
                        <input type="text" name="rollno" class="paras" placeholder="Enter your roll no"><br>
                        <label for="act" class = "text-font">Activity:</label>
                        <select name="act">
                            <option value="Paper Presentation">Paper Presentation</option>
                            <option value="Project Presentation">Project Presentation</option>
                            <option value="Techno Managerial Event*">Techno Managerial Event*</option>
                            <option value="Sports And Games">Sports And Games</option>
                            <option value="Membership">Membership</option>
                            <option value="LeaderShip / Organizing Events">LeaderShip / Organizing Events</option>
                            <option value="VAC / Online Courses">VAC / Online Courses</option>
                            <option value="Project To Paper / Patent / Copyright">Project To Paper / Patent / Copyright</option>
                            <option value="GATE / CAT / Govt exams">GATE / CAT / Govt exams</option>
                            <option value="Placement & Internship">Placement & Internship</option>
                            <option value="Entrepreneurship">Entrepreneurship</option>
                            <option value="Social Activity">Social Activity</option>
                        </select><br>
                        <label for="part" class = "text-font ">Participated:</label>
                        <select name="part">
                            <option value="Inter clg">Inter clg</option>
                            <option value="Intra clg">Intra clg</option>
                        </select><br>
                        <label for = "cer" class="text-font">Certificate:</label>
                        <select name="cer">
                            <option value="Won">Won</option>
                            <option value="Participated">Participated</option>
                        </select>
                        <label>File upload</label>
                        <input type="file" name="img" accept=".jpg, .jpeg, .png" > <br>
                        <label for="name">Name :</label>
                        <input type="text" name="name" class="paras" placeholder="Enter your name"><br>
                        <label for="name">Date :</label>
                        <input type="date" name="date" class="paras" placeholder="Enter date "><br>
                        <a class = "btn btn-success m-3" href = "certificate.php">back</a>
                        <input type="submit" name="update" value="Updata Data">
                    </div>
                        </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
