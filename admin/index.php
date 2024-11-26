<?php
    require("../all/all.php");
    require("../common/env.php");
    require("../common/function.php");
    require_once("control/queryControl.php");
    require("model/query.php");

    require("model/userQuery.php");
    require("control/userControl.php");



    
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
        "binhluan" => (new queryControl) -> binhluan(),
        "donhang" => (new queryControl) -> donhang(),

        "logout" => (new userControl) -> logout()
    }
?>