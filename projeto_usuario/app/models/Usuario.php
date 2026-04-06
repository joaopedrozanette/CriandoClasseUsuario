<?php
namespace app\models;

use DateTimeImmutable;

class Usuario
{
    private int $id;
    private string $nomeUsuario;
    private string $email;
    private string $senha;
    private string $perfil;
    private DateTimeImmutable $criadoEm;

    public function __construct(
        int $id = 0,
        string $nomeUsuario = '',
        string $email = '',
        string $senha = '',
        string $perfil = 'user',
        ?DateTimeImmutable $criadoEm = null
    ) {
        $this->id = $id;
        $this->nomeUsuario = $nomeUsuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->perfil = $perfil;
        $this->criadoEm = $criadoEm ?? new DateTimeImmutable();
    }

    public function getId(): int { return $this->id; }
    public function getNomeUsuario(): string { return $this->nomeUsuario; }
    public function getEmail(): string { return $this->email; }
    public function getSenha(): string { return $this->senha; }
    public function getPerfil(): string { return $this->perfil; }
    public function getCriadoEm(): DateTimeImmutable { return $this->criadoEm; }

    public function setId(int $id): void { $this->id = $id; }
    public function setNomeUsuario(string $nomeUsuario): void { $this->nomeUsuario = $nomeUsuario; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setSenha(string $senha): void { $this->senha = $senha; }
    public function setPerfil(string $perfil): void { $this->perfil = $perfil; }
}
