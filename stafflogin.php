<?php
$logged=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'servert.php';
  $username=$_POST['username'];
  $pwd=$_POST['pwd'];

  $sql="SELECT * FROM stflog WHERE username='$username' AND pwd='$pwd'";

  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      $row=mysqli_fetch_assoc($result);
      $username = $row['username'];
      $department = $row['department'];
      $email = $row['email'];
      $pwd = $row['pwd'];
     
      echo "Login Successful";
      $logged=1;
      session_start();
      $_SESSION['username']=$username;
      $_SESSION['department']=$department;
      $_SESSION['email']=$email;
      $_SESSION['pwd']=$pwd;
      
      header('location:requestpage.php');
  }
}
else{
  $invalid=1;
}
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
            body {
                background-color: #f5f5f5;
                font-family: 'Arial', sans-serif;
            }

            .container-fluid {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .mains-login-container {
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }

            .login-heading {
                font-family: 'Georgia', serif;
                font-size: 2.5rem;
                color: #333333;
            }

            .login-container {
                width: 100%;
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fafafa;
                border-radius: 8px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }

            .paragraphs {
                font-size: 1rem;
                color: #555555;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #cccccc;
                border-radius: 4px;
            }

            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="password"]:focus {
                border-color: #007bff;
                outline: none;
            }

            .login-button {
                display: inline-block;
                padding: 10px 20px;
                margin-right: 10px;
                background-color: #007bff;
                color: #ffffff;
                text-decoration: none;
                border-radius: 4px;
                transition: background-color 0.3s ease;
            }

            .login-button:hover {
                background-color: #0056b3;
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
                transition: background-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .d-flex {
                display: flex;
                align-items: center;
            }

            .justify-content-end {
                justify-content: flex-end;
            }
        </style>
        <script>
            function formValidation(){
                let x=document.forms["form1"]["username"].value;
                if (x==''){
                    alert("username must be filled out");
                    return false;
                }
            }
            function newFunction(){
                document.getElementById("form1").reset();
            }
        </script>
    </head>
    <body>
        <main>
            <form action="stafflogin.php" method="post" name="form1" id="form1" onSubmit="return formValidation()">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mains-login-container">
                            <h1 class="login-heading text-logins m-5 text-center">STAFF LOGIN</h1>
                            <div class="login-container ml-auto mr-auto">
                                <label class="paragraphs p-2">Name</label><input type="text" placeholder="Enter User Name" id="username" name="username"><br>
                                <label class="paragraphs p-2">Department</label><input type="text" placeholder="Enter department" id="department" name="department"><br>
                                <label class="paragraphs p-2">Email Id</label><input type="email" placeholder="Enter User email" id="email" name="email"><br>
                                <label class="paragraphs p-2">Password</label><input type="password" placeholder="Enter User password" id="pwd" name="pwd"><br>
                                <div class="d-flex flex-row justify-content-end">
                                    <a class="login-button" href="home.php">Back</a>
                                    <button type="submit" class="btn btn-primary" style="width:50%">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>
