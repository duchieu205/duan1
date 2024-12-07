
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
            <?php if(isset($_SESSION['email'])) { ?>
                <span>Xin chào</span>
       
            <?php } else { ?>
                <a href="?act=signup">Sign Up</a>
                <a href="?act=signin">Sign In</a>
            <?php }?>
            <input type="text" placeholder="Tìm kiếm...">
            <a href="?act=cart"><i class="fas fa-shopping-cart"></i></a>
            <?php if(isset($_SESSION['email'])) {?>
                <a href="?act=logout">Đăng xuất</a>
            <?php } ?>
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
                                <form method="POST" action="?act=cart">
                                    <input type="hidden" name="ma_sanpham" value="<?= $rs->ma_sp ?>">
                                    <label for="quantity">Số lượng muốn mua : </label>
                                    <input name="quantity" id="quantity" type="number" min="1" max="<?= $rs->soluong ?>" value="1"> <br> <br>   
                                    <button name="btn_submit" type="submit">Thêm vào giỏ hàng</button>
                                </form>                 
                </div>
                <?php endforeach; ?>
            </div>
            
        
    </div>

        </section>

        <!-- Bình luận sản phẩm -->
        <section class="product-comments">
            <h2>Bình luận</h2>
            <form action="?act=binhluan&id=<?php echo $ma_sp; ?>" method="post">
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


    <script>
        const input = document.getElementById('quantity');
        const max = <?= $rs->soluong ?>;
        input.addEventListener('input', () => {
            if (input.value < 1 || input.value > max) {
                input.value = Math.min(Math.max(input.value, 1), max);
            } 
        });
</script>
</body>
</html>
