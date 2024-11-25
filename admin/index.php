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
        "update" => (new queryControl) -> update($id),
        "product" => (new queryControl) -> listProduct(),
        "delete" => (new queryControl) -> delete($id),
        "user" => (new queryControl) -> user(),
        "danhmuc" => (new queryControl) -> danhmuc(),
        "binhluan" => (new queryControl) -> binhluan(),
        "donhang" => (new queryControl) -> donhang(),
        "create" => (new queryControl) -> create()
    }
?>