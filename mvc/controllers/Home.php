<?php 
    class Home extends Controller {
        function ShowProject($language) {
            // Model
            $project = $this->model('project');
            $language = $project->Language($language);

            // View
            $this->view('MainLayout');
        }
    }
?>