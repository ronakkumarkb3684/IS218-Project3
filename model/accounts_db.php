<?php
function validate_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
    }
}
function get_username($userid){
    global $db;
    $query = 'SELECT fname, lname FROM accounts where id=:userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);
    // Execute the SQL Query
    $statement->execute();
    $names=$statement->fetch();
    // Close the database
    $statement->closeCursor();
    $firstName=$names['fname'];
    $secondName=$names['lname'];

    return $firstName . ' ' .$secondName;
}

function new_user($email, $firstName, $lastName, $birthDay, $password){
    global $db;
    $query = 'INSERT INTO accounts
                (email, fname, lname, birthday, password)
              VALUES
                (:email, :fname, :lname, :birthday, :password)';

    // Create PDO Statement
    $statement = $db->prepare($query);

    //binding the values to sql
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $firstName);
    $statement->bindValue(':lname', $lastName);
    $statement->bindValue(':birthday', $birthDay);
    $statement->bindValue(':password', $password);

    // Execute the SQL Query
    $statement->execute();
    //
    // Close the database
    $statement->closeCursor();

}