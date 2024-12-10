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


        "danhmuc" => (new queryControl) -> danhmuc(),
        "donhang" => (new donhangControl) -> list(),
        "chitiet" => (new donhangControl) -> chitiet($id), 
        "trangthai" => (new donhangControl) -> trangthai($id),
        "updateTrangthai" => (new donhangControl) -> updateTrangthai($id),
        "logout" => (new userControl) -> logout(),
        "binhluan" => (new binhluanControl) -> binhluan($id),
        "updateBinhLuan" => (new binhluanControl) -> updateBinhLuan()
    }
?>