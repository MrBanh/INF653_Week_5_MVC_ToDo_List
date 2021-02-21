<?php
require_once('model/database.php');
require_once('model/item_db.php');
require_once('model/category_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'item_list';
    }
}

switch ($action) {
    case 'item_list':
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
        if (!$categoryID) {
            $item_list = get_todo_items();
        } else {
            $item_list = get_todo_by_category($categoryID);
        }
        $category_list = get_categories();
        include('view/item_list.php');
        break;
    default:
        break;
}
?>