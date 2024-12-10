
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
                <li><a href="?act=shop">Trang chủ</a></li>

                
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
                
                <?php if($rs->soluong > 0) { ?>
                <div class="confirm">
                                <form method="POST" action="?act=cart">
                                    <input type="hidden" name="ma_sanpham" value="<?= $rs->ma_sp ?>">
                                    <label for="quantity">Số lượng muốn mua : </label>
                                    <input name="quantity" id="quantity" type="number" min="1" max="<?= $rs->soluong ?>" value="1"> <br> <br>   
                                    <button name="btn_submit" type="submit">Thêm vào giỏ hàng</button>
                                </form>                 
                </div>
                <?php }
                else { ?> 
                    <h3>Sản phẩm này hiện tại đã hết hàng. Vui lòng mua sản phẩm khác !</h3>
                <?php } endforeach; ?>
            </div>
            
        
    </div>

        <div class="binhluan">
            <?php foreach($listBinhLuan as $list) : ?>
            <span><strong>Khách hàng <?= $list['NAME']?> đã bình luận : </strong><?= $list['BINHLUAN'] ?></span> <br> <br>
            <?php endforeach; ?>
        </div>

        </section>

        <!-- Bình luận sản phẩm -->
         <?php if(isset($_SESSION['email'])) { ?>
        <section class="product-comments">
            <h2>Bình luận</h2>
            <form class="comment" action="?act=binhluan" method="POST">
                <input type="hidden" name="ma_sp" value="<?= $result[0]->ma_sp ?>">
                <textarea name="comment" rows="4" placeholder="Viết bình luận của bạn..."></textarea>
                <button name="btn_binhluan" type="submit" class="btn btn-secondary">Gửi bình luận</button>
            </form>
        </section>
        <?php }

        else { ?>
            Vui lòng <a href="?act=signin">Đăng nhập</a> để bình luận
        <?php } ?>
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
