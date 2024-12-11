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
    <link rel="stylesheet" href="css/ctsp1.css?v=<?php echo time() ?>">
    <link href="css/sb-admin-2.min.css?v=<?php echo time() ?>" rel="stylesheet">

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

    <div class="container-fluid">
            <h2 class="h2 text-success mb-4">Đơn hàng của tôi</h2>
            <a href="?act=donhang"><button class="btn btn-success">Tất cả</button></a>
            <a href="?act=donhangchoxuli"><button class="btn btn-success">Chờ xử lí</button></a>
            <a href="?act=donhangdahuy"><button class="btn btn-success">Đã hủy</button></a>
            <a href="?act=donhangdaxacnhan"><button class="btn btn-success">Đã xác nhận</button></a>
            <a href="?act=donhangdanggiao"><button class="btn btn-success">Đang giao</button></a>
            <a href="?act=donhangthanhcong"><button class="btn btn-success">Thành công</button></a>
            <a href="?act=donhangchoxacnhantra"><button class="btn btn-success">Chờ xác nhận trả hàng/hoàn tiền</button></a>

            <a href="?act=donhangtra"><button class="btn btn-success">Xác nhận Trả hàng/ Hoàn tiền</button></a>
            <a href="?act=donhangtuchoi"><button class="btn btn-success">Từ chối Trả hàng/ Hoàn tiền</button></a>
            <table class="table table-striped">
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
                    $ma = 1;
                    if (is_array($result)) { 
                            foreach ($result as $rs) :?>  
                     <tr>
                        <td><?= $rs['MA_DONHANG'] ?></td>
                        <td><?= number_format($rs['TONGTIEN']) . " Đ" ?></td>
                        <td><?= $rs['NGAYHOANTHANH'] ?></td>
                        <td><?= $rs['DIACHI'] ?></td>
                        <td><?= $rs['TRANGTHAI'] ?></td>
                        <td>
                        <?php if($rs['TRANGTHAI'] == "Đã hủy") { ?>
                            Hủy đơn do : <?= $rs['GHICHU'] ?>
                        <?php }
                            if ($rs['TRANGTHAI'] == "Chờ xác nhận trả hàng/hoàn tiền") { ?>
                            Trả hàng/ hoàn tiền do : <?= $rs['GHICHU'] ?>
                         <?php   }
       
                            else { ?>
                            <?= $rs['GHICHU'] ?>
                        <?php }?>
                        </td>
                        
                        
                        <td>
                            <?php if ($rs['TRANGTHAI'] === "Chờ xử lí" ) { ?>
                            <button onclick="huyDon('<?= $rs['MA_DONHANG'] ?>')"  class="btn btn-danger btn-sm">Hủy</button>
                            <?php } ?>
                            <?php if($rs['TRANGTHAI'] === "Thành công") { ?>
                            <button onclick="traHang('<?= $rs['MA_DONHANG'] ?>')" class="btn btn-danger">Trả hàng/ Hoàn tiền</button>
                            <?php } ?>
                            <a href="?act=chitietdonhang&id=<?= $rs['MA_DONHANG'] ?>"><button class="btn btn-success">Chi tiết đơn hàng</button></a>
                        </td>
                     </tr>
                   <?php endforeach; }?>
                </tbody>
            </table>
            <a href="?act=cart"><button class="btn btn-secondary">Quay lại giỏ hàng</button></a>


        <div id="my-popover" popover>
            <form action="?act=trahang" method="POST">
                <input type="hidden" name="ma_donhang" id="ma_donhang_trahang">
                <label for="lidotrahang">Nhập lí do trả hàng : </label>  
                <input name="lidotrahang" type="text"> <br> <br>
                <button name="btn_trahang" class="btn btn-success" type="submit">Xác nhận</button>
            </form>
        </div>

        <div id="popover_huy" popover>
            <form action="?act=huydon" method="POST">
                <input type="hidden" name="ma_donhang" id="ma_donhanghuy">
                <label for="lidohuydon">Nhập lí do hủy đơn : </label> <br>
                <input name="lidohuydon" type="text"> <br> <br>
                <button name="btn_huydon" class="btn btn-success" type="submit">Xác nhận</button>
            </form>
        </div>
    </div>
    
    <script>
        function huyDon(maDonHang) {
            document.getElementById('ma_donhanghuy').value = maDonHang;
            const popoverHuy = document.getElementById('popover_huy');
            popoverHuy.style.display = 'block'; // Hiển thị popover
        }

        function traHang(maDonHang) {
            document.getElementById('ma_donhang_trahang').value = maDonHang;
            const popover = document.getElementById('my-popover');
            popover.style.display = 'block'; // Hiển thị popover
        }
        
        

    </script>

</body>
</html>