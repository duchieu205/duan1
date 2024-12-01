
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
   
    <link rel="stylesheet" href="css/ctsp.css?v=<?php echo time() ?>">
    <!-- Thêm thư viện icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
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
            <a href="?act=signup">Sign Up</a>
            <a href="?act=signin">Sign In</a>
            <input type="text" placeholder="Tìm kiếm...">
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
        </div>
    </header>

    <!-- Nội dung chính -->
    <main>
        <section>
            <div class="box_product">
            <?php foreach($result as $rs) : ?>
            <img title="<?= $rs->image ?>" src="<?= BASE_URL .  $rs->image ?>" alt="">
            <div class="product">
                <h3 ><?= $rs->name ?></h3>
                <div class="gia">
                    <span><?= number_format($rs->gia) . " Đ" ?></span>
                </div>
                <div class="mieuta">
                <p>Số lượng còn lại : <?= $rs->soluong ?></p>

                    <p><strong><?= $rs->mota ?> </strong></p>
                </div>
            
                <div class="confirm">
                    <a href="?act=cart&add<?= $rs->ma_sp ?>"><button class="dathang" name="mua_sp">Thêm vào giỏ hàng</button></a>                    
                </div>
                <?php endforeach; ?>
            </div>
            
        
    </div>

        </section>

        <!-- Bình luận sản phẩm -->
        <section class="product-comments">
            <h2>Bình luận</h2>
            <form action="index.php?act=binhluan&id=<?php echo $ma_sp; ?>" method="post">
                <textarea name="comment" rows="4" placeholder="Viết bình luận của bạn..."></textarea>
                <button type="submit" class="btn btn-secondary">Gửi bình luận</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>© 2024 Trang Bán Hàng. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
