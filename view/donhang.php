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
            <h2 class="h2 text-success mb-4">Đơn hàng của tôi</h2>
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>

                <tbody id="cart-items">
                    <?php
                    if (is_array($result)) { 
                            foreach ($result as $rs) :?>  
                     <tr>
                        <td><?= $rs['MA_DONHANG'] ?></td>
                        <td><?= number_format($rs['TONGTIEN']) . " Đ" ?></td>
                        <td><?= $rs['NGAYHOANTHANH'] ?></td>
                        <td><?= $rs['DIACHI'] ?></td>
                        <td><?= $rs['TRANGTHAI'] ?></td>
                        <td><?= $rs['GHICHU'] ?></td>
                        <td>
                            <a  return onclick="confirm('Bạn có chắc muốn hủy ?')" ><button  class="btn btn-danger btn-sm">Hủy</button></a>
                            <button class="btn btn-success" popovertarget="my-popover">Trả hàng/ Hoàn tiền</button>
                            <a href="?act=chitietdonhang&id=<?= $rs['MA_DONHANG'] ?>"><button class="btn btn-success">Chi tiết đơn hàng</button></a>
                        </td>
                     </tr>
                   <?php endforeach; }?>
                </tbody>
            </table>
            <a href="?act=cart"><button class="btn btn-secondary">Quay lại giỏ hàng</button></a>

      
                        
        </div>
                              
        </div>

        <div id="my-popover" popover>
            <form action="">
                <label for="lido">Nhập lí do trả hàng : </label>
                <input name="lido" type="text"> <br>
                <button class="btn btn-success" type="submit">Xác nhận</button>
            </form>
        </div>
    </div>


</body>
</html>