<?php
    function insert_todo($newTitle, $newDescription, $categoryID) {
        global $db;
        $count = 0;

        $query = "INSERT INTO todoitems (Title, Description, categoryID)
                    VALUES (:newTitle, :newDescription, :categoryID)";
        $statement = $db->prepare($query);
        $statement->bindValue(':newTitle', $newTitle);
        $statement->bindValue(':newDescription', $newDescription);
        $statement->bindValue(':categoryID', $categoryID);

        if ($statement->execute()) {
            $count = $statement->rowCount();
        }

        $statement->closeCursor();
        return $count;
    }

    function select_todo_items() {
        global $db;

        $query = "SELECT * FROM todoitems ORDER BY ItemNum ASC";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();        // fetch all results in table
        $statement->closeCursor();      // close db connection

        return $results;
    }

    function delete_todo($itemNum) {
        global $db;
        $count = 0;

        $query = 'DELETE FROM todoitems
                    WHERE ItemNum = :itemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemNum', $itemNum);

        if($statement->execute()) {
            $count = $statement->rowCount();
        }

        $statement->closeCursor();
        return $count;
    }
?>