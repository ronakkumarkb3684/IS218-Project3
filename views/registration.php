<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<main>
    <div class="registrationForm">
        <!--        <img src="../css/images/avatar.png" class="avatar">-->
        <?php include('abstract-views/header.php'); ?>

        <h1>Registration Form</h1>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="create_user">

            <div class="form-group">
                <label for="first-name">First name</label>
                <input type="text" class="form-control" name="first-name" id="first-name">
            </div>

            <div class="form-group">
                <label for="last-name">Last name</label>
                <input type="text" class="form-control" name="last-name" id="last-name">
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" name="birthday" id="birthday">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" value="register">Register</button>
        </form>

        <?php include('abstract-views/footer.php.php'); ?>
    </div>
</main>
</body>
</html>


