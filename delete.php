<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <?php 
    $user_id = $_GET['user_id'] ?? null; 
    $getUserById = $user_id ? getUserByID($pdo, $user_id) : null; 
    ?>

    <?php if ($getUserById): ?>
        <h1>Are you sure you want to delete user <br> <?php echo htmlspecialchars($getUserById['first_name']); ?>?</h1>

        <section class="form-div">
            <form class="deleteForm" action="handleForms.php?user_id=<?php echo $user_id; ?>" method="POST" onsubmit="return confirmDeletion();">
                <p style="text-align: center; font-size: 20px; font-weight: bold;">First Name: <?php echo htmlspecialchars($getUserById['first_name']); ?> </p>
                <p style="text-align: center; font-size: 20px; font-weight: bold;">Last Name: <?php echo htmlspecialchars($getUserById['last_name']); ?> </p>
                <p style="text-align: center; font-size: 20px; font-weight: bold;">Gender: <?php echo htmlspecialchars($getUserById['gender']); ?> </p>
                <p style="text-align: center; font-size: 20px; font-weight: bold;">Age: <?php echo htmlspecialchars($getUserById['age']); ?> </p>
                <p style="text-align: center; font-size: 20px; font-weight: bold;">Experience: <?php echo htmlspecialchars($getUserById['experience']); ?> </p>
                <p style="text-align: center; font-size: 20px; font-weight: bold;">Job: <?php echo htmlspecialchars($getUserById['job']); ?> </p>
                <input class="submit-btn" id="submit" type="submit" value="Delete User" name="deleteUserBtn">
            </form>
        </section>
        <a class="a-link" href="index.php"><button class="back-btn">Back</button></a>
    <?php else: ?>
        <h1>User not found.</h1>
        <a class="a-link" href="index.php"><button class="back-btn">Back</button></a>
    <?php endif; ?>

    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</body>
</html>
