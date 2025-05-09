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
    <title>Giỏ hàng</title>
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
                <li><a href="">Trang chủ</a></li>
   
                
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
                        <td><?= $rs['SOLUONG'] ?></td>
                        <td><strong><?= number_format($rs['total_price']) . " Đ" ?></strong></td>
                        <td><a return onclick="confirm('Bạn có chắc muốn xóa')" href="?act=deleteCart&id=<?= $rs['MA_GIOHANGITEM'] ?>"><button class="btn btn-danger btn-sm">Xóa</button></a></td>
                     </tr>
                     
                <?php endforeach; ?>    
                </tbody>
            </table>
            <div class="col-lg-4">
                <?php
                    $tong = 0;
                    foreach($result as $rs) :
                        $tong += $rs['total_price'];
                ?>
                <?php endforeach;  ?>
                <?php if(!$result){ 
                         echo "Giỏ hàng trống"; 
                 } 
                 
                else { ?>
                    <p><strong>Tổng tiền tạm tính : <span id="cart-total"><?= number_format($tong) . " Đ" ?></span> </strong> </p>
                <label class="mb-3" for=""><input checked type="radio">Thanh toán khi nhận hàng</label>
                <p><strong>Phí ship COD : 30.000 Đ</strong></p>
                <h3 class="text-success mb-3">Tổng đơn hàng : <?= number_format($tong + 30000) . " Đ" ?></h3>
                <?php }
                ?>  <br> <br>
                <a href="?act=shop" class="btn btn-outline-success">Mua thêm</a>

            </div>

        <a href="?act=donhang"><button class="button1">Đơn hàng của tôi</button></a>
                        
        </div>
                        

        <!-- form đặt hàng -->
        <form action="?act=donhang" method="POST" enctype="multipart/form-data" class="form col-lg-4">
                    <?php
                        if (is_array($user)) {
                    // foreach($user as $us): ?>
                    <span class="input-span">
                        <label for="password" class="label">Họ tên</label>
                        <input value="<?= $user['NAME'] ?>" type="text" name="name" id="password"
                    /></span>

                    <span class="input-span">
                        <label for="email" class="label">Email</label>
                        <input value="<?= htmlspecialchars($user['EMAIL']) ?>" type="email" name="email" id="email"
                    /></span>
                    

                    <span class="input-span">
                        <label for="password" class="label">Số điện thoại</label>
                        <input value="<?= $user['SDT'] ?>" type="tel" name="sdt" id="password"
                    /></span>

                    <span class="input-span">
                        <label for="password" class="label">Địa chỉ</label>
                        <input value="<?= $user['DIACHI'] ?>" type="text" name="diachi" id="password"
                    /></span>
                        <!-- <?php  }?> -->
                    <button name="submit_user" class="btn btn-success" type="submit">Đặt hàng</button>
            </form>
       
        </div>

                
    </div>


</body>
</html>