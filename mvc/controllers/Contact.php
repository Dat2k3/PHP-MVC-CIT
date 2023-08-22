<?php 
    class Contact {
        function contact() {
            $this->view("home", ["Page" => "contact"]);
        }
    }
?>