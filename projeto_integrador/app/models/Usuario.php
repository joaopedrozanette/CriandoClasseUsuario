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

    public function __construct(int $id, string $nomeUsuario, string $email, string $senha, string $perfil)
    {
        $this->id = $id;
        $this->nomeUsuario = $nomeUsuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->perfil = $perfil;
        $this->criadoEm = new DateTimeImmutable();
    }
    
    public static function fromArray(array $data): self
    {
        return new self(
            (int)($data['id'] ?? 0),
            $data['nomeUsuario'] ?? '',
            $data['email'] ?? '',
            $data['senha'] ?? '',
            $data['perfil'] ?? 'user'
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNomeUsuario(): string
    {
        return $this->nomeUsuario;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getPerfil(): string
    {
        return $this->perfil;
    }

    public function eAdmin(): bool
    {
        return $this->perfil === 'admin';
    }

    public function getCriadoEm(): DateTimeImmutable
    {
        return $this->criadoEm;
    }

    public function setCriadoEm(DateTimeImmutable $criadoEm): void
    {
        $this->criadoEm = $criadoEm;
    }
}