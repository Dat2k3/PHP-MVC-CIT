<?php 
    class home extends Controller {
        function login() {
            $this->view("home", ["Page" => "login", "Title"  =>"Login / Register"]);
        }

        function forget() {
            $this->view("home", ["Page" => "forget", "Title"  =>"Forget password"]);
        }

        function newpassword() {
            $this->view("home", ["Page" => "newpassword", "Title"  =>"Change password"]);
        }

        function comment() {
            $this->view("home", ["Page" => "comment", "Title"  =>"Comment"]);
        }

        function settings() {
            $this->view("home", ["Page" => "settings", "Title"  =>"Settings"]);
        }

        function exit() {
            $this->view("home", ["Page" => "home", "Title"  =>"CIT"]);
        }
        
    }
?>