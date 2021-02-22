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

    // TODO: add item
    // TODO: delete item
    case 'add_item':

        break;

    case 'category_list':
        $category_list = get_categories();
        include('view/category_list.php');
        break;

    case 'add_category':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        if ($categoryName) {
            $count = add_category($categoryName);
            header("Location: .?action=category_list&added_category={$count}");
        } else {
            $error_message = 'Invalid category.';
            include('view/error.php');
        }
        break;
    case 'delete_category':
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
        if ($categoryID) {
            $count = delete_category($categoryID);
            header("Location: .?action=category_list&&deleted_category={$count}");
        } else {
            $error_message = 'Invalid category.';
            include('view/error.php');
        }
        break;

    default:
        header("Location: .");
        break;
}
?>