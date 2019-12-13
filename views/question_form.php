<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
<main>
    <div class="questionForm">
        <!--        <img src="images/list.png" class="avatar">-->
        <?php include('abstract-views/header.php'); ?>

        <h1>Question Form</h1>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="create_new_question">

            <div class="form-group">
                <label for="Question-name">Question Name</label>
                <input type="text" class="form-control" name="Question-name" id="Question-name">
            </div>

            <div class="form-group">
                <label for="Question-body">Question Body</label>
                <input type="text" class="form-control" name="Question-body" id="Question-body">
            </div>

            <div class="form-group">
                <label for=Question-skills>Question Skills</label>
                <input type="text" class="form-control" name="Question-skills" id="Question-skills">
            </div>
            <button type="submit" value="login">Submit</button>
        </form>

        <?php include('abstract-views/footer.php.php'); ?>
    </div>
</main>
</body>
</html>
