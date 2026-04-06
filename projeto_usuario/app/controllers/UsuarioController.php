<?php
namespace app\controllers;

use app\models\Usuario;
use app\services\UsuarioService;

class UsuarioController
{
    private UsuarioService $service;

    public function __construct()
    {
        $this->service = new UsuarioService();
    }

    public function index()
    {
        $usuarios = $this->service->getUsuarios();
        print_r($usuarios);
    }

    public function salvar()
    {
        $usuario = new Usuario(
            0,
            $_POST['nomeUsuario'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['perfil']
        );

        if (!$this->service->saveUsuario($usuario)) {
            echo "Email já cadastrado!";
        } else {
            echo "Usuário salvo com sucesso!";
        }
    }
}
