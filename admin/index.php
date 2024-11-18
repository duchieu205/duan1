<?php
    require("../all/all.php");
    require("../common/env.php");
    require("../common/function.php");
    require_once("control/queryControl.php");
    require("model/query.php");
    
    $act = $_GET['act'] ?? "";
    $id = $_GET['id'] ?? "";


    match ($act) {
        "" => (new queryControl) -> list()
    }
?>