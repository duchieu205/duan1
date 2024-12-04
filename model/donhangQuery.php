<?php
    class donhangQuery {
        public $db;

        public function __construct() {
            $this->db = connectDB();
        }

        public function __destruct() {
            $this->db = NULL;
        }

        
    }
?>