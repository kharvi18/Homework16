<?php require('connection.php');
//Check form input validation
if (!empty($_POST["register-user"])) {
foreach ($_POST as $key => $value) {
    if (empty($_POST[$key])) {
        $error_message = "All Fields are required";
        break;
    }
}
}
//Check password validation
if ($_POST['password'] != $_POST['confirm_password']) {
    $error_message = 'Passwords should be same<br>';
}
// Email Validation
if (!isset($error_message)) {
    if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid Email Address";
    }
}
//Check if gender is selected
if (!isset($error_message)) {
    if (!isset($_POST["gender"])) {
        $error_message = " All Fields are required";
    }
}
//Add user data to database
if (isset($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userPassword = md5($_POST['userPassword']);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['userAge'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO users (username, email, password, firstName, lastName, age, gender) 
                  VALUES('$username', '$email', '$userPassword', '$firstName', '$lastName', 
                  '$age', '$gender')";
    $result = $conn->query($sql);
    if (!empty($result)) {
        $error_message = "";
        $success_message = "You have registered successfully!";
        unset($_POST);
    } else {
        $error_message = "Problem in registration. Try Again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home16</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
<h1>Registration form</h1>
<form name="formRegistration" method="post" action="">
    <table border="0" width="500" align="center" class="table">
        <?php if (!empty($success_message)) { ?>
            <div class="success-message"><?php if (isset($success_message)) echo $success_message; ?></div>
        <?php } ?>
        <?php if (!empty($error_message)) { ?>
            <div class="error-message"><?php if (isset($error_message)) echo $error_message; ?></div>
        <?php } ?>
        <tr>
            <td>User Name</td>
            <td><input type="text" class="InputBox" name="userName"
                       value="<?php if (isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" class="InputBox" name="firstName"
                       value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" class="InputBox" name="lastName"
                       value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" class="InputBox" name="password" value=""></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" class="InputBox" name="confirm_password" value=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" class="InputBox" name="userEmail"
                       value="<?php if (isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" class="InputBox" name="userAge"
                       value="<?php if (isset($_POST['userAge'])) echo $_POST['userAge']; ?>"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="radio" name="gender" value="Male"
                       <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") { ?>checked<?php } ?>> Male
                <input type="radio" name="gender" value="Female"
                       <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") { ?>checked<?php } ?>> Female
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="register-user"
                       value="Submit"
                       class="btnRegister"></td>
        </tr>
    </table>
</form>

</body>
</html>