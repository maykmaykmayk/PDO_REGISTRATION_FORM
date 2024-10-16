<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewUserBtn'])) {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $age = $_POST['age'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $job = $_POST['job'] ?? '';

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($experience) && !empty($job)) {
        $query = insertNewUserToRecords($pdo, $firstName, $lastName, $gender, $age, $experience, $job);

        if ($query === true) {
            header("Location:index.php");
            exit();
        } else {
            echo $query;
        }
    } else {
        echo "Do not leave a field empty";
    }
}

if (isset($_POST['editUserBtn'])) {
    $user_id = $_GET['user_id'] ?? null;
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $age = $_POST['age'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $job = $_POST['job'] ?? '';

    if ($user_id && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($experience) && !empty($job)) {
        $query = updateAUser($pdo, $user_id, $firstName, $lastName, $gender, $age, $experience, $job);

        if ($query === true) {
            header("Location:index.php");
            exit();
        } else {
            echo $query;
        }
    } else {
        echo "Please provide all fields and a valid user ID.";
    }
}

if (isset($_POST['deleteUserBtn'])) {
    $user_id = $_GET['user_id'] ?? null;

    if ($user_id) {
        $query = deleteAUser($pdo, $user_id);

        if ($query === true) {
            header("Location:index.php");
            exit();
        } else {
            echo $query;
        }
    } else {
        echo "User ID is required for deletion.";
    }
}
?>
