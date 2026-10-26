
<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$errors = [];
$success = "";

$username = $_SESSION['username'];
$result = pg_query_params($conn, 'SELECT * FROM users WHERE username = $1', [$username]);
$user = pg_fetch_assoc($result);

if (!$user) {
    session_destroy();
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $address = trim($_POST['address']);
    $phone_number = trim($_POST['phone_number']);
    $gender = $_POST['gender'];

    if (empty($address)) {
        $errors[] = "Address is required";
    }

    if (strlen($phone_number) != 11) {
        $errors[] = "Phone Number should be in 11 numbers";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    if (empty($errors)) {

        $result = pg_query_params(
        $conn,'UPDATE users SET address = $1, phone_number = $2, gender = $3 WHERE username = $4', [$address, $phone_number, $gender, $username]);
        if ($result) {
            $success = "Profile updated successfully";
            $result = pg_query_params(
                $conn,
                'SELECT * FROM users WHERE username = $1',
                [$username]
            );
            $user = pg_fetch_assoc($result);
        } else {
            $errors[] = "Failed to update profile";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>

<body>

    <h3>Edit Profile</h3>
    <form method="POST">
        <label for="address">Address:</label>
        <input
            type="text"
            name="address"
            id="address"
            value="<?php echo $user['address'] ?? ''; ?>"
        >
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <br><br>
        <label for="phone_number">Phone Number:</label>
        <input
            type="text"
            name="phone_number"
            id="phone_number"
            value="<?php echo $user['phone_number'] ?? ''; ?>"
        >
        <br><br>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="Male"
                <?php if (($user['gender'] ?? '') == 'Male') echo 'selected'; ?>>
                Male
            </option>
            <option value="Female"
                <?php if (($user['gender'] ?? '') == 'Female') echo 'selected'; ?>>
                Female
            </option>
        </select>
        <br><br>
        <button type="submit">Update</button>
    </form>
    <br><br>
    <?php echo $user['address'] . "<br>"; ?> <a href="dashboard.php">Delete</a>
    <br><br>
    <a href="dashboard.php">Back to Dashboard</a>
    <?php

    if ($success) {
        echo $success;
    }

    foreach ($errors as $error) {
        echo $error . "<br>";
    }

    ?>
</body>
</html>
