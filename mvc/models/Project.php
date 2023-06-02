<?php 
    class project {
        function getProjectEng() {
            require_once './mvc/core/Connection.php';
            $conn = connect_database();
            $data = [];

            $result = $conn->query("select * from projects where language = 'english'");
            if($result->num_rows > 0) {
                for($i = 1; $i <= $result->num_rows; $i++) {
                    $data[] = $result->fetch_assoc();
                }
            }
            return $data;
        }

        function getProjectVie() {
            require_once './mvc/core/Connection.php';
            $conn = connect_database();
            $data = [];

            $result = $conn->query("select * from projects where language = 'vietnamese'");
            if($result->num_rows > 0) {
                for($i = 1; $i <= $result->num_rows; $i++) {
                    $data[] = $result->fetch_assoc();
                }
            }
            return $data;
        }

        function Language($language) {
            if($language == 'vi')
                echo "vietnamese";
            if($language == 'en')
                echo "english";
        }
    }
?>