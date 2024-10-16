<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <?php 
    $user_id = $_GET['user_id'] ?? null; 
    $getUserById = $user_id ? getUserByID($pdo, $user_id) : null; 
    ?>

    <?php if ($getUserById): ?>
        <h1>Dream Job Registration Page <br> <?php echo htmlspecialchars($getUserById['first_name']); ?>!</h1>

        <section class="form-div">
            <form action="handleForms.php?user_id=<?php echo $user_id; ?>" method="POST">
                <p>
                    <label class="bold" for="firstName">First Name: </label>
                    <input type="text" name="firstName" required value="<?php echo htmlspecialchars($getUserById['first_name']); ?>">
                </p>

                <p>
                    <label class="bold" for="lastName">Last Name: </label>
                    <input type="text" name="lastName" required value="<?php echo htmlspecialchars($getUserById['last_name']); ?>">
                </p>

                <p>
                    <label class="bold" for="gender">Gender: </label>
                    <select name="gender">
                        <option value="Male" <?php if ($getUserById['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($getUserById['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Prefer Not to Say" <?php if ($getUserById['gender'] == 'Prefer Not to Say') echo 'selected'; ?>>Prefer Not to Say</option>
                    </select>
                </p>

                <p>
                    <label class="bold" for="age">Age: </label>
                    <input type="number" name="age" required value="<?php echo htmlspecialchars($getUserById['age']); ?>">
                </p>

                <p>
                    <label class="bold" for="experience">Experience: </label>
                    <select name="experience">
                        <option value="No Experience Yet or Fresh Grad" <?php if ($getUserById['experience'] == 'No Experience Yet or Fresh Grad') echo 'selected'; ?>>N/A</option>
                        <option value="1 Year" <?php if ($getUserById['experience'] == '1 Year') echo 'selected'; ?>>1 Year</option>
                        <option value="2-10 Years" <?php if ($getUserById['experience'] == '2-10 Years') echo 'selected'; ?>>2-10 Years</option>
                        <option value="11-15 Years" <?php if ($getUserById['experience'] == '11-15 Years') echo 'selected'; ?>>11-15 Years</option>
                        <option value="16+ Years" <?php if ($getUserById['experience'] == '16+ Years') echo 'selected'; ?>>16+ Years</option>
                    </select>
                </p>

                <p class="bold select-job">Select your Job:</p>
                 <input type="radio" id="lawyer" name="job" value="Lawyer" required>
                 <label for="lawyer">Lawyer</label><br>

                 <input type="radio" id="policeman" name="job" value="Policeman">
                 <label for="policeman">Policeman</label><br>

                 <input type="radio" id="fireman" name="job" value="Fireman">
                 <label for="fireman">Fireman</label><br>

                 <input type="radio" id="teacher" name="job" value="Teacher">
                 <label for="teacher">Teacher</label><br>

                 <input type="radio" id="nurse" name="job" value="Nurse">
                 <label for="nurse">Nurse</label><br>

                 <input type="radio" id="engineer" name="job" value="Engineer">
                 <label for="engineer">Engineer</label><br>

                 <input type="radio" id="chef" name="job" value="Chef">
                 <label for="chef">Chef</label><br>

                 <input type="radio" id="artist" name="job" value="Artist">
                 <label for="artist">Artist</label><br>

                 <input type="radio" id="programmer" name="job" value="Programmer">
                 <label for="programmer">Programmer</label><br>

                 <input type="radio" id="architect" name="job" value="Architect">
                 <label for="architect">Architect</label><br>

                <br>
                <p>
                    <input class="submit-btn" id="submit" type="submit" value="Edit User Info" name="editUserBtn">
                </p>
                
            </form>
        </section>
        <a class="a-link" href="index.php"><button class="back-btn">Back</button></a>
    <?php else: ?>
        <h1>User not found.</h1>
        <a class="a-link" href="index.php"><button class="back-btn">Back</button></a>
    <?php endif; ?>
</body>
</html>
