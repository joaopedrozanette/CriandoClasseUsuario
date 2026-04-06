<?php
namespace app\services;

use app\models\Usuario;
use app\repositories\UsuarioRepository;

class UsuarioService
{
    private UsuarioRepository $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }

    public function getUsuarios(): array
    {
        return $this->repository->getUsuarios();
    }

    public function saveUsuario(Usuario $usuario): bool
    {
        if ($this->repository->getUsuarioByEmail($usuario->getEmail())) {
            return false;
        }
        return $this->repository->saveUsuario($usuario);
    }
}
