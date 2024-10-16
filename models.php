<?php
require_once 'dbConfig.php';

function insertNewUserToRecords($pdo, $firstName, $lastName, $gender, $age, $experience, $job) {
    $sql = "INSERT INTO dreamjob_registration (first_name, last_name, gender, age, experience, job)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$firstName, $lastName, $gender, $age, $experience, $job]);
        return true;
    } catch (PDOException $e) {
        return "Error inserting user: " . $e->getMessage();
    }
}

function seeAllUserRecords($pdo) {
    $sql = "SELECT * FROM dreamjob_registration";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        return "Error retrieving users: " . $e->getMessage();
    }
}

function getUserByID($pdo, $user_id) { 
    $sql = "SELECT * FROM dreamjob_registration WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        return "Error retrieving user: " . $e->getMessage();
    }
}

function updateAUser($pdo, $user_id, $firstName, $lastName, $gender, $age, $experience, $job) {
    $sql = "UPDATE dreamjob_registration
            SET first_name = ?, 
                last_name = ?, 
                gender = ?,
                age = ?, 
                experience = ?, 
                job = ?
            WHERE user_id = ?";
    
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$firstName, $lastName, $gender, $age, $experience, $job, $user_id]);
        return true;
    } catch (PDOException $e) {
        return "Error updating user: " . $e->getMessage();
    }
}

function deleteAUser($pdo, $user_id) {
    $sql = "DELETE FROM dreamjob_registration WHERE user_id = ?"; 
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$user_id]);
        return true;
    } catch (PDOException $e) {
        return "Error deleting user: " . $e->getMessage();
    }
}
?>
