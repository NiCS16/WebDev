<?php
require("controller.php");

// Check if the form is submitted for adding a relation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_relation"])) {
    // Get the selected menu and chef names from the form
    $menuName = $_POST["menu_name"];
    $chefName = $_POST["chef_name"];

    // Call the createRelation function to create the relationship
    createRelationByName($menuName, $chefName);
}

// Check if the form is submitted for deleting a relation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_relation"])) {
    // Get the selected menu and chef IDs from the form
    $menuID = $_POST["menu_id"];
    $chefID = $_POST["chef_id"];

    // Call the deleteRelation function to delete the relationship
    deleteRelation($menuID, $chefID);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Chef Relations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=1694400947">
</head>

<body class="container mt-5">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="view_item.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_chef.php">Chef</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="view_menuchef.php">Menu - Chef</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Menu Name</th>
                        <th>Chef Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $relations = getRelations();
                foreach ($relations as $relation) :
                    $menu = getMenuById($relation->menuID);
                    $chef = getChefById($relation->chefID);
                ?>
                    <tr>
                        <td><?php echo $menu->namaMenu; ?></td>
                        <td><?php echo $chef->namaChef; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="menu_id" value="<?php echo $relation->menuID; ?>">
                                <input type="hidden" name="chef_id" value="<?php echo $relation->chefID; ?>">
                                <button type="submit" name="delete_relation" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <hr>
            <h2>Add a Relation</h2>
            <br>
            <form method="post">
                <div class="mb-3">
                    <label for="menu_name" class="form-label">Select Menu:</label>
                    <select name="menu_name" class="form-select" required>
                        <?php foreach (getMenu() as $menuItem) : ?>
                        <option value="<?php echo $menuItem->namaMenu; ?>"><?php echo $menuItem->namaMenu; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="chef_name" class="form-label">Select Chef:</label>
                    <select name="chef_name" class="form-select" required>
                        <?php foreach (getChef() as $chefItem) : ?>
                        <option value="<?php echo $chefItem->namaChef; ?>"><?php echo $chefItem->namaChef; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="add_relation" class="btn btn-primary">Add Relation</button>
            </form>
        </div>
    </div>
</body>

<footer>
    Copystraight 2023 Hiroshi Sexyman
</footer>

</html>