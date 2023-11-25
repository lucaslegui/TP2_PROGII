<?php

class TemplateController {

    public function loadView($viewName) {
        $pageContent = "views/pages/{$viewName}.php";
        include "views/template.php";
    }

}
?>
