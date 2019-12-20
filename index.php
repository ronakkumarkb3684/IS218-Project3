<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style></style>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>


<?php
require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        include('views/login.php');
        break;
    }

    case 'validate_login': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($email == NULL || $password == NULL) {
            $error = "Email and Password not included";
            include('errors/error.php');
        } else {
            $userId = validate_login($email, $password);
            echo "User ID IS: $userId";
            if ($userId == false) {
                header("Location: .?action=display_registration");
            } else {
                header("Location: .?action=display_questions&userId=$userId");
            }
        }

        break;
    }

    case 'display_registration': {
        include('views/registration.php');
        break;
    }
    case 'create_user':{
        $email = filter_input(INPUT_POST, 'email');
        $firstName = filter_input(INPUT_POST, 'first-name');
        $lastName = filter_input(INPUT_POST, 'last-name');
        $birthDay = filter_input(INPUT_POST, 'birthday');
        $password = filter_input(INPUT_POST, 'password');

        if($email == NULL|| $firstName == NULL || $lastName == NULL || $birthDay == NULL|| ($password == NULL || strlen($password) <= 8)){
            $error = "Please make sure the entered information is correct";
            echo $error;
        }
        else{
            new_user($email, $firstName, $lastName, $birthDay, $password);
            header("Location: .?action=show_login");
        }
        break;

    }

    case 'display_questions': {
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL || $userId < 0) {
            header('Location: .?action=display_login');
        } else {
            $questions = get_users_questions($userId);
            include('views/display_questions.php');
        }
        break;
    }

    case 'display_question_form': {
        $userId = filter_input(INPUT_GET, 'userId');
        session_start();
        $_SESSION['userId'] = $userId;
        include('views/question_form.php');
        break;
    }

    case 'create_new_question':{
        session_start();
        $userId = $_SESSION['userId'];

        $QuestionName = filter_input(INPUT_POST, 'Question-name');
        $QuestionBody = filter_input(INPUT_POST, 'Question-body');
        $QuestionSkills = filter_input(INPUT_POST, 'Question-skills');

        $CheckSkills = explode(',', $QuestionSkills);

        if ($QuestionName == NULL || ($QuestionBody == NULL || strlen($QuestionBody) >= 500) || ($QuestionSkills == NULL || count($CheckSkills) < 2)){
            $error = "Please make sure the fields are not left empty";
            echo $error;
        }
        else{
            new_question($userId, $QuestionName, $QuestionBody, $QuestionSkills);
            header("Location: .?action=display_questions&userId=$userId");
        }
        break;
    }

    case 'delete_question':{
        $userId = $_SESSION['userId'];
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        delete_question($questionId);
        header("Location: .?action=display_questions&userId=$userId");
        break;

    }

    case 'single_question':{
        $userId = $_SESSION['userId'];
        $questionId = filter_input(INPUT_GET, 'questionId');
        $userId = filter_input(INPUT_GET, 'userId');
        if ($questionId == NULL) {
            $error = 'User Id unavailable';
            echo $error;
        } else {
            $questions = one_question($questionId);
            include('views/display_single_question.php');
        }
        break;

    }

    case 'view_others_questions':
    {
        $userId = $_SESSION['userId'];
        $userId = filter_input(INPUT_GET, 'userId');
        if ($userId == NULL) {
            $error = 'User Id unavailable';
            echo $error;
        } else {
            $questions = all_users_questions($userId);
            include('views/display_all_questions.php');
        }
        break;
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}?>
</body>
</html>
