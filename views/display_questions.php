<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
<main>
    <?php include('abstract-views/header.php'); ?>


    <h1> Questions of  <?php echo get_username($userId);
        $questions = get_users_questions($userId);
        ?></h1>
    <a href=".?action=display_question_form&userId=<?php echo $userId ?>"><input type="submit" value="Add New Question"></a><br>

   <!-- <form action="index.php" method="post">
        <input type="hidden" name="action" value="view_others_questions">
        <input type="hidden" name="userId" value="<?php /*echo $userId; */?>">
        <input type="submit" value="View Others Questions" class="btn">
    </form>-->

    <a href=".?action=view_others_questions&userId=<?php echo $userId; ?>">View Other Questions</a>

    <table align="center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Body</th>
            <th>Skills</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        <?php foreach($questions as $question) : ?>
            <tr>
                <td><?php echo $question['id'];?></td>
                <td><?php echo $question['title']; ?></td>
                <td><?php echo $question['body']; ?></td>
                <td><?php echo $question['skills']; ?></td>
                <td>
                    <form>
                        <input type="hidden" name="action" value="single_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">
                        <input type="hidden" name="userId" value="<?php echo $userId ?>">

                        <button><input type="submit" class="btn edit" value="View"></button>
                    </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                        <input type="hidden" name="userId" value="<?php echo $userId ?>">

                        <button><input class="btn" type="submit" value="Delete"></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href=".?action=show_login"><input type="button" value="Log Out"></a>
    <?php include('abstract-views/footer.php'); ?>
</main>
</body>
</html>
