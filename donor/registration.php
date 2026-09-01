<?php

include "../config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $blood_group = $_POST["blood_group"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO donors 
            (name, email, phone, blood_group, gender, address, password)
            VALUES 
            ('$name', '$email', '$phone', '$blood_group', '$gender', '$address', '$password')";

    if (mysqli_query($conn, $sql)) {
        $message = "Donor registration successful!";
    } else {
        $message = "Registration failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <link rel="stylesheet" href="../index.css">
</head>

<body>

<div class="registration-container">

    <h1>Donor Registration</h1>
    <p>Register as a blood donor</p>

    <?php if ($message != "") { ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <form method="POST" action="">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" name="phone" placeholder="Enter your phone number" required>
        </div>

        <div class="form-group">
            <label>Blood Group</label>
            <select name="blood_group" required>
                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>

        <div class="form-group">
            <label>Gender</label>

            <div class="gender-options">
                <label>
                    <input type="radio" name="gender" value="Male" required>
                    Male
                </label>

                <label>
                    <input type="radio" name="gender" value="Female">
                    Female
                </label>

                <label>
                    <input type="radio" name="gender" value="Other">
                    Other
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" placeholder="Enter your address" required></textarea>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Create a password" required>
        </div>

        <button type="submit">Register as Donor</button>

    </form>

    <p class="login-link">
        Already registered here ?
        <a href="login.php">Login</a>
    </p>

</div>

</body>
</html>