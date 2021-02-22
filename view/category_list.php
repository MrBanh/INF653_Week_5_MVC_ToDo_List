<?php include('header.php'); ?>
    <section class="category_list">
    <h2>Category List</h2>
    <div class="category_list_container">
        <?php if (!empty($category_list)) { ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th> </th>
                </tr>

                <?php foreach ($category_list as $category) {
                    $categoryID = $category['categoryID'];
                    $categoryName = $category['categoryName'];
                ?>

                    <tr>
                        <td><?= $categoryName ?></td>
                        <td>
                            <form class="delete_category" action="." method="POST">
                                <input type="hidden" name="action" value="delete_category">
                                <input type="hidden" name="categoryID" value="<?= $categoryID ?>">
                                <button class="delete_btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No categories exist yet.</p>
        <?php } ?>
    </div>

    <h2>Add Category</h2>
    <form action="." method="POST">
        <input type="hidden" name="action" value="add_category">
        <label for="categoryName">Name: </label>
        <input type="text" name="categoryName" id="categoryName">
        <button class="add_btn">Add Category</button>
    </form>

    <p><a href=".">View To Do List</a></p>
</section>
<?php include('footer.php'); ?>