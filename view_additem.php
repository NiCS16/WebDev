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
                    <a class="nav-link" href="view_item.php">Menu</a>
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
            <h1>Tambah Menu</h1>
            <hr>
            <div class="text-start">
                <form action="controller.php" method="POST">
                    <div class="mb-3">
                        <label for="namaMenu">Nama: </label>
                        <input type="text" class="form-control" id="namaMenu" name="namaMenu" required><br>
                    </div>
                    <div class="mb-3">
                        <label for="type">Jenis : </label>
                        <select class="form-select" id="type" name="type" aria-label="Default select example">
                            <option value="Makanan" selected>Food - Appetizer</option>
                            <option value="Makanan">Food - Main Course</option>
                            <option value="Makanan">Food - Dessert</option>
                            <option value="Minuman">Drink - Regular</option>
                            <option value="Minuman">Drink - Coffee</option>
                            <option value="Minuman">Drink - Juice</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga">Harga: </label>
                        <input type="number" class="form-control" id="harga" name="harga" required><br>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi: </label>
                        <input id="deskripsi" class="form-control" name="deskripsi" required></input><br>
                    </div>
                    <input class="btn btn-primary" type="submit" id="submit" name="submitmenu" value="Submit">
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