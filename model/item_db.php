<?php
    function get_todo_by_category($categoryID) {
        global $db;
        $query = 'SELECT * FROM todoitems
                    WHERE todoitems.categoryID = :categoryID
                    ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $todoItems = $statement->fetchAll();
        $statement->closeCursor();
        return $todoItems;
    }

    function get_todo($itemNum) {
        global $db;
        $query = 'SELECT * FROM todoitems
                    WHERE ItemNum = :itemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemNum', $itemNum);
        $statement->execute();
        $todo = $statement->fetch();
        $statement->closeCursor();
        return $todo;
    }

    function get_todo_items() {
        global $db;
        $query = 'SELECT * FROM todoitems ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();        // fetch all results in table
        $statement->closeCursor();      // close db connection
        return $results;
    }

    function add_todo($newTitle, $newDescription, $categoryID) {
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