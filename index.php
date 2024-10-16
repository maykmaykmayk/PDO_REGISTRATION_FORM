<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Job Registration Page</title>
</head>
<body>
    <h1>Welcome to Your Dream Job Registration Page!</h1>
    <section class="form-div">
        <form action="handleForms.php" method="post">
            <p>
                <label class="bold" for="firstName">First Name:</label>
                <input type="text" name="firstName" required>
            </p>

            <p>
                <label class="bold" for="lastName">Last Name:</label>
                <input type="text" name="lastName" required>
            </p>

            <p>
                <label class="bold" for="gender">Gender:</label>
                <select name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer Not to Say">Prefer Not to Say</option>
                </select>
            </p>

            <p>
                <label class="bold" for="age">Age:</label>
                <input type="number" name="age" required>
            </p>

            <label class="bold" for="experience">Experience:</label>
            <select name="experience" required>
                <option value="Fresh Graduate">N/A or Fresh Grad</option>
                <option value="1 Year">1 Year</option>
                <option value="2-10 Years">2-10 Years</option>
                <option value="11-15 Years">11-15 Years</option>
                <option value="16+ Years">16+ Years</option>
            </select>
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
                <input class="submit-btn" id="submit" type="submit" name="insertNewUserBtn" value="Register">
            </p>
        </form>
    </section>

    <section class="records">
        <table style="width:50%; margin-top:50px;">
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Experience</th>
                <th>Job</th>
                <th>Action</th>
            </tr>

            <?php $insertNewUserToRecords = seeAllUserRecords($pdo); ?>
            <?php foreach ($insertNewUserToRecords as $row) { ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['experience']; ?></td>
                <td><?php echo $row['job']; ?></td>
                <td>
                    <a href="edit.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>
                    <a href="delete.php?user_id=<?php echo $row['user_id']; ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </section>
</body>
</html>
