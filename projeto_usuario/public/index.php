<?php
require_once '../vendor/autoload.php';

use app\controllers\UsuarioController;

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvar();
} else {
    $controller->index();
}
