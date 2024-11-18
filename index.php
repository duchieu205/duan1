<?php
    require("common/env.php");
    require("common/function.php");
    require("all/all.php");
    require("control/queryControl.php");
    require("model/query.php");
    // require("")


    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";

    match ($act) {
        "" => (new queryControl) -> list()
    }
    
?>