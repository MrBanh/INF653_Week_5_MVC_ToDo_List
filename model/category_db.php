<?php
    function insert_category($categoryName) {
        global $db;
        $count = 0;

        $query = "INSERT INTO categories (categoryName)
                    VALUES (:categoryName)";
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $categoryName);

        if ($statement->execute()) {
            $count = $statement->rowCount();
        }

        $statement->closeCursor();
        return $count;
    }

    function select_categories() {
        global $db;

        $query = "SELECT * FROM categories";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    function delete_category($categoryID) {
        global $db;
        $count = 0;

        $query = 'DELETE FROM categories
                    WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);

        if($statement->execute()) {
            $count = $statement->rowCount();
        }

        $statement->closeCursor();
        return $count;
    }
?>