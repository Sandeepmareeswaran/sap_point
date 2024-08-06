<?php
$logged = 0;
$invalid = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'serverh.php';
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $rollno = $_POST['rollno'];

    $sql = "SELECT * FROM stulog WHERE username='$username' AND pwd='$pwd' AND email='$email' AND rollno='$rollno'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $rollno = $row['rollno'];
            $email = $row['email'];
            $pwd = $row['pwd'];

            $logged = 1;
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['rollno'] = $rollno;
            $_SESSION['email'] = $email;
            $_SESSION['pwd'] = $pwd;

            header('location:certificate.php');
        } else {
            $invalid = 1;
        }
    } else {
        $invalid = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
        }

        .main-login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        .login-heading {
            font-size: 1.5rem;
            font-weight: 700;
            color: #000000;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }

        .btn-link {
            color: #007bff;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .alert {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <main>
        <form action="studentlogin.php" method="post" name="form1" id="form1" onsubmit="return formValidation()">
            <div class="main-login-container">
                <h1 class="login-heading">STUDENT LOGIN</h1>
                <div class="login-container">
                    <div class="form-group">
                        <label for="username" class="paragraph">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="paragraph">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="pwd" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="email" class="paragraph">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="rollno" class="paragraph">Roll No</label>
                        <input type="text" class="form-control" placeholder="Enter Roll No" id="rollno" name="rollno">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="home.php" class="btn btn-link">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?php if ($invalid) { ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid username, password, email, or roll number.
                        </div>
                    <?php } ?>
                </div>
            </div>
        </form>
    </main>

    <script>
        function formValidation() {
            let username = document.forms["form1"]["username"].value;
            let pwd = document.forms["form1"]["pwd"].value;
            let email = document.forms["form1"]["email"].value;
            let rollno = document.forms["form1"]["rollno"].value;
            if (username == '' || pwd == '' || email == '' || rollno == '') {
                alert("All fields must be filled out");
                return false;
            }
        }
    </script>
</body>
</html>