<?php

class TemplateController {
    public function loadView($viewName, $tipoFiltro = null) {
        $pageContent = "views/pages/{$viewName}.php";
        include "views/template.php";
    }
}

?>
