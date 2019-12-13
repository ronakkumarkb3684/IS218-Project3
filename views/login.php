<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<main>
    <div class="loginForm">
        <?php include('abstract-views/header.php'); ?>
        <!--        <img src="../css/images/avatar.png" class="avatar">-->
        <h1>Login Form</h1>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="validate_login">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <button type="submit" value="login">Submit</button>
            <p>Not Registered?, click below to create account</p>
            <p><button type="submit"><a href=".?action=display_registration">Register</a></button></p>
        </form>

        <?php include('abstract-views/footer.php'); ?>
    </div>
</main>
</body>
</html>



