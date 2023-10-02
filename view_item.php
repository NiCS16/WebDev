<?php
require("controller.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=1694400947">
</head>

<body class="container mt-5">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="view_item.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_chef.php">Chef</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_menuchef.php">Menu - Chef</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <h1>Daftar Menu</h1>
            <div class="text-start">
                <form action="view_additem.php" method="POST">
                    <button class="btn btn-primary">Add Menu</button>
                </form>
            </div>
            <hr>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tool</th>
                    </tr>
                    <?php
                        $allmenu = getmenu();
                        foreach ($allmenu as $index => $menu) {
                        ?>
                    <tr>
                        <td><?= $menu->namaMenu ?></td>
                        <td><?= $menu->type ?></td>
                        <td><?= $menu->harga ?></td>
                        <td><?= $menu->deskripsi ?></td>
                        <td>
                            <a href="view_updateitem.php?updatemenuID=<?= $index ?>">
                                <button class="btn btn-warning">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="controller.php?deletemenuID=<?= $index ?>">
                                <button class="btn btn-danger">
                                    Hapus
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </thead>
            </table>
        </div>
    </div>
</body>
<footer>
    Copystraight 2023 Hiroshi Sexyman
</footer>

</html>