<?php

function get_users_questions($ownerId) {
    global $db;

    $query = 'SELECT * FROM questions WHERE ownerId = :ownerId';

    $statement = $db->prepare($query);

    $statement->bindValue(':ownerId', $ownerId);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function new_question($userId, $QuestionName, $QuestionBody, $QuestionSkills){
    global $db;
    //sql query
    $query = 'INSERT INTO questions
                (ownerid, title, body, skills)
              VALUES
                (:ownerid, :title, :body, :skills)';

    // Create PDO Statement
    $statement = $db->prepare($query);

    //binding the values to sql
    $statement->bindValue(':ownerid', $userId);
    $statement->bindValue(':title', $QuestionName);
    $statement->bindValue(':body', $QuestionBody);
    $statement->bindValue(':skills', $QuestionSkills);

    // Execute the SQL Query
    $statement->execute();

    // Close the database
    $statement->closeCursor();

}

function delete_question($id){
    global $db;
    $query = "DELETE FROM questions WHERE id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}