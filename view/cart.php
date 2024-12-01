<?php
   
    if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
        header("Location: ?act=signin");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="stylesheet" href="css/ctsp.css?v=<?php echo time() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <div class="logo">
            <img src="img/1.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?act=thuonghieu&thuonghieu=iPhone">iPhone</a></li>
                <li><a href="index.php?act=thuonghieu&thuonghieu=Oppo">Oppo</a></li>
                <li><a href="index.php?act=thuonghieu&thuonghieu=Samsung">Samsung</a></li>
                <li><a href="index.php?act=thuonghieu&thuonghieu=Xiaomi">Xiaomi</a></li>
                
            </ul>
        </nav>
        <div class="search-cart">
            Xin chào
            <input type="text" placeholder="Tìm kiếm...">
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
            <a href="?act=logout">Đăng xuất</a>
        </div>
    </header>

    <div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="h2 text-success mb-4">My Cart</h2>
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên </th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Tạm tính</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Items will be dynamically loaded here -->
                    <?php foreach ($result as $rs) : ?>

                     <tr>
                        <td><img src="<?= BASE_URL . $rs['ANH_SP'] ?>" alt=""></td>
                        <td><?= $rs['TEN_SP'] ?></td>
                        <td><?= number_format($rs['GIA_SP']) . " Đ" ?></td>
                        <td><?= 1 ?></td>
                        <td><?= number_format($rs['GIA_SP'] * 1) . " Đ" ?></td>
                        <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                     </tr>
                     
                <?php endforeach; ?>    
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h3 class="text-success mb-3">Tổng tiền</h3>
            <p><strong>Tổng : </strong> <span id="cart-total">100.000 Đ</span></p>
            <a href="?act=shop" class="btn btn-outline-success">Thêm Đơn Hàng</a>
            <a href="?act=checkout" class="btn btn-success">Mua</a>
        </div>
    </div>
</div>


</body>
</html>