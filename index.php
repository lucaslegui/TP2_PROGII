<?php

require_once 'controllers/Controller.php';

$template = new TemplateController();


$view = $_GET['page'] ?? 'home'; 

switch ($view) {
    case 'home':
        $template->loadView('home');
        break;
    case 'productos':
        $tipoFiltro = $_GET['tipo'] ?? 'all';
        $template->loadView('productos', $tipoFiltro);
        break;
       
    case 'about':
        $template->loadView('about');
        break;
    case 'contacto':
        $template->loadView('contacto');
        break;   
}

?>
