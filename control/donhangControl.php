<?php
    class donhangControl {
        public $donhangControl;

        public function __construct() {
            $this->donhangControl = new donhangQuery;
        }

        public function __destruct() {
            $this->donhangControl = NULL;
        }

        public function list() {
            include("view/donhang.php");
        }
    }
?>