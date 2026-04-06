<?php
namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Usuario;
use PDO;

class UsuarioRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getUsuarios(): array
    {
        $sql = "SELECT id, nome_usuario as nomeUsuario, email, perfil FROM usuarios";
        return $this->connection->query($sql)->fetchAll();
    }

    public function getUsuarioByEmail(string $email)
    {
        $stmt = $this->connection->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function saveUsuario(Usuario $usuario): bool
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO usuarios (nome_usuario, email, senha, perfil)
             VALUES (:nome, :email, :senha, :perfil)"
        );
        $stmt->bindValue(':nome', $usuario->getNomeUsuario());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stmt->bindValue(':perfil', $usuario->getPerfil());
        return $stmt->execute();
    }
}
