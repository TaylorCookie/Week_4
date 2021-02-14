<?php

require('database.php');

$newtitle = filter_input(INPUT_POST, "newtitle", FILTER_SANITIZE_STRING);
$newdescription = filter_input(INPUT_POST, "newdescription", FILTER_SANITIZE_STRING);

if ($newtitle && $newdescription) {
    $query = "INSERT INTO todoitems
                    (Title, Description)
                VALUES
                    (:title, :description)";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $newtitle);
    $statement->bindValue(':description', $newdescription);
    $statement->execute();
    $statement->closeCursor();
}

include('index.php'); 
?>    