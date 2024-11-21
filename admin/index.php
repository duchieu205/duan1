<?php
    require("../all/all.php");
    require("../common/env.php");
    require("../common/function.php");
    require_once("control/queryControl.php");
    require("model/query.php");
    
    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";


    match ($act) {
        "" => (new queryControl) -> list(),
        "admin" => (new queryControl) -> list(),
        "product" => (new queryControl) -> listProduct(),
        "user" => (new queryControl) -> user(),
        "danhmuc" => (new queryControl) -> danhmuc(),
        "binhluan" => (new queryControl) -> binhluan(),
        "donhang" => (new queryControl) -> donhang()
    }
?>