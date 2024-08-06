<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:studentlogin.php'); // Redirect to login page if not logged in
    exit();
}

include 'serverh.php'; // Include the database connection

$username = $_SESSION['username'];

// Fetch student details from the database
$sql = "SELECT * FROM stulog WHERE username='$username'";
$result = mysqli_query($con, $sql);

if ($result) {
    $student = mysqli_fetch_assoc($result);
    if (!$student) {
        echo "No details found for the user.";
        exit();
    }
} else {
    echo "Error fetching details: " . mysqli_error($con);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .profile-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .profile-container {
            padding: 20px;
            width: 100%;
            max-width: 600px;
        }

        .profile-heading {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: left;
        }

        .profile-container h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-align: left;
        }

        .btn-container {
            margin-top: 20px;
            text-align: left;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            margin: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="profile-wrapper">
        <div class="profile-container">
            <h1 class="profile-heading">Profile</h1>
            <h3>Name: <?php echo htmlspecialchars($student['username']); ?></h3>
            <h3>Roll No: <?php echo htmlspecialchars($student['rollno']); ?></h3>
            <h3>Email: <?php echo htmlspecialchars($student['email']); ?></h3>
            <h3>SAP Points: <?php echo htmlspecialchars($student['sap']); ?></h3>
            <div class="btn-container">
                <a class="btn btn-primary" href="home.php">Back</a>
                <a class="btn btn-primary" href="profilepicture.php">Upload Certificate</a>
            </div>
        </div>
    </div>
</body>

</html>
