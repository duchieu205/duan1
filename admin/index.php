<?php
    require("../all/all.php");
    require("../common/env.php");
    require("../common/function.php");
    require_once("control/queryControl.php");
    require("model/query.php");

    require("model/userQuery.php");
    require("control/userControl.php");

    require("model/donhangQuery.php");
    require("control/donhangControl.php");

    require("model/binhluanQuery.php");
    require("control/binhluanControl.php");




    
    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";


    match ($act) {
        "" => (new queryControl) -> list(),
        "admin" => (new queryControl) -> list(),
        "update" => (new queryControl) -> update($id),
        "product" => (new queryControl) -> listProduct(),
        "delete" => (new queryControl) -> delete($id),
        "create" => (new queryControl) -> create(),
        
        "user" => (new userControl) -> user(),
        "deleteUser" => (new userControl) -> deleteUser($id),

        "xacnhantrahang" => (new donhangControl) -> xacnhantrahang($id),
        "tuchoitrahang" => (new donhangControl) -> tuchoitrahang($id),
        "danhmuc" => (new queryControl) -> danhmuc(),
        "donhang" => (new donhangControl) -> list(),
        "chitiet" => (new donhangControl) -> chitiet($id), 
        "trangthai" => (new donhangControl) -> trangthai($id),
        "updateTrangthai" => (new donhangControl) -> updateTrangthai($id),
        "logout" => (new userControl) -> logout(),
        "binhluan" => (new binhluanControl) -> binhluan($id),
        "updateBinhLuan" => (new binhluanControl) -> updateBinhLuan(),

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