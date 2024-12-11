<?php
    require("common/env.php");
    require("common/function.php");
    require("all/all.php");
    require("control/queryControl.php");
    require("model/query.php");
    require("control/cartControl.php");
    require("model/cartQuery.php");
    require("model/userQuery.php");
    require("model/donhangQuery.php");
    require("control/donhangControl.php");
    require("model/binhluanQuery.php");
    require("control/binhluanControl.php");
    // require("")


    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";


    match ($act) {
        "" => (new queryControl) -> home(),
        "home" => (new queryControl) -> home(),
        "shop" => (new queryControl) -> list(),
        "signin" => (new queryControl) -> signin(),
        "signup" => (new queryControl) -> signup(),
        "detail" => (new queryControl) -> detail($id),
        "logout" => (new queryControl) -> logout(),
        "cart" => (new cartControl) -> cart(),
        "deleteCart" => (new cartControl) -> deleteCart($id),
        "donhang" => (new donhangControl) -> list(),
        "chitietdonhang" => (new donhangControl) -> chitiet($id),
        "huydon" => (new donhangControl) -> huydon(),
        "trahang" => (new donhangControl) -> trahang(),
        "binhluan" => (new binhluanControl) -> binhluan($id),

        "donhangdahuy" => (new donhangControl) -> donhang_dahuy(),
        "donhangchoxuli" => (new donhangControl) -> donhang_choxuli(),
        "donhangdaxacnhan" => (new donhangControl) -> donhang_daxacnhan(),
        "donhangdanggiao" => (new donhangControl) -> donhang_danggiao(),
        "donhangthanhcong" => (new donhangControl) -> donhang_thanhcong(),
        "donhangtra" => (new donhangControl) -> donhang_tra(),
        "donhangchoxacnhantra" => (new donhangControl) -> donhang_choxacnhantra(),
        "donhangtuchoi" => (new donhangControl) -> donhang_tuchoi()
        
    }
    
?>