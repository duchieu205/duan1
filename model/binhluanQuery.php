<?php
    class binhluanQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = null;
        }


        // public function addBinhLuan()
    }
?>