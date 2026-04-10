<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Usuario;
use app\services\UsuarioService;

class UsuarioController extends Controller
{
    private UsuarioService $service;

    public function __construct()
    {
        $this->service = new UsuarioService();
    }

    public function index()
    {
        $data['usuarios'] = $this->service->getUsuarios();
        $this->view('usuario/usuario_list', $data);
    }

    public function criar()
    {
        $this->view('usuario/usuario_create');
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data['usuario'] = $this->service->getUsuarioById($id);
        $this->view('usuario/usuario_edit', $data);
    }

    public function atualizar()
    {
        $usuario = new Usuario(
            $_POST['id'],
            $_POST['nomeUsuario'],
            $_POST['email'],
            $_POST['senha'] ?? '',
            $_POST['perfil']
        );
        $this->service->updateUsuario($usuario);
        $this->redirect(URL_BASE . '/usuarios');
    }

    public function salvar() {

    $nomeUsuario = $_POST['nomeUsuario'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $perfil = $_POST['perfil'] ?? 'user';

    $usuario = new Usuario(0, $nomeUsuario, $email, $senha, $perfil);

    if ($this->service->saveUsuario($usuario)) {
        $this->redirect(URL_BASE . '/usuarios');
    } else {
        $data["usuario"] = $_POST;
        $data['erros']['email'] = "Erro: Este e-mail já está cadastrado!";
        
        $this->view('usuario/usuario_create', $data); 
    }
}
    public function excluir() {
    $id = $_GET['id'];
    $this->service->deleteUsuario($id);
    $this->redirect(URL_BASE . '/usuarios');
}
}
