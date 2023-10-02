<?php
require("controller.php");
if (isset($_GET["updatemenuID"])){
    $menu_id = $_GET["updatemenuID"];
    $menu = getMenuById($menu_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=1694400947">
</head>

<body class="container mt-5">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="view_item.php">View Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_additem.php">Add Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_menuchef.php">Menu - Chef</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <h1>Update Menu</h1>
            <div class="text-start">
                <form action="controller.php" method="POST">
                    <div class="mb-3">
                        <label for="namaMenu">Nama: </label>
                        <input type="text" class="form-control" id="namaMenu" name="namaMenu"
                            value="<?=$menu->namaMenu?>"><br>
                    </div>
                    <div class="mb-3">
                        <label for="type">Jenis : </label>
                        <select class="form-select" id="type" name="type" aria-label="Default select example"
                            value="<?=$menu->type?>">
                            <option value="Makanan">Food - Appetizer</option>
                            <option value="Makanan">Food - Main Course</option>
                            <option value="Makanan">Food - Dessert</option>
                            <option value="Minuman">Drink - Regular</option>
                            <option value="Minuman">Drink - Coffee</option>
                            <option value="Minuman">Drink - Juice</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga">Harga: </label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?=$menu->harga?>"><br>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi: </label>
                        <input id="deskripsi" class="form-control" name="deskripsi"
                            value="<?=$menu->deskripsi?>"></input><br>
                    </div>
                    <input type="hidden" name="inputmenu_id" value="<?=$menu_id?>">
                    <button name="submitmenuedit" type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
    </div>

</body>
<footer>
    Copystraight 2023 Hiroshi Sexyman
</footer>

</html>