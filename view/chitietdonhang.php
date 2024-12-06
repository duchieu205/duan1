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
                <li><a href="?act=shop">Trang chủ</a></li>
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
            <h2 class="h2 text-success mb-4">Chi tiết đơn hàng</h2>
            
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Tên </th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Tạm tính</th>
       
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <?php $id = 1; 
                    foreach ($result as $rs) : ?>
                     <tr>
                        <td><?= $id++ ?></td>
                        <td><?= $rs['MA_SP'] ?></td>
                        <td><img src="<?= BASE_URL . $rs['ANH_SP'] ?>" alt=""></td>
                        <td><?= $rs['TEN_SP'] ?></td>
                        <td><?= number_format($rs['GIA_SP']) . " Đ" ?></td>
                        <td><?= $rs['SOLUONG'] ?></td>
                        <td><?= number_format($rs['total_price']) . " Đ" ?></td>
                     </tr>
                    <?php endforeach; ?>
      
                </tbody>
            </table>
            
        <div class="user">
            <h3>Thông tin người nhận</h3>
            <p>Họ và tên : <?= $user['NAME'] ?></p>
            <p>Email : <?= $user['EMAIL'] ?></p>
            <p>Số điện thoại : <?= $user['SDT'] ?></p>
            <p>Địa chỉ : <?= $user['DIACHI'] ?></p>
        </div>
                        
        </div>
            <div class="col-lg-4 ">
                <?php if(is_array($result1)) { ?>
                <p><strong>Tổng tiền tạm tính : <span id="cart-total"><?= number_format($result1['TONGTIEN']) . " Đ" ?></span> </strong> </p>
                <label class="mb-3" for="">Phương thức thanh toán : Thanh toán khi nhận hàng</label>
                <p><strong>Phí ship COD : 30.000 Đ</strong></p>
                <h3 class="text-success mb-3">Tổng đơn hàng : <?= number_format($result1['TONGTIEN'] + 30000) . " Đ" ?></h3>
                <?php }?>
            </div>
            <!-- điều hướng -->
            <a href="?act=donhang"><button class="btn btn-success">Quay lại đơn hàng</button></a>
        </div>
    </div>
    


</body>
</html>