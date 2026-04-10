<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador • Novo Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Novo Usuário</h2>
            <a href="<?= URL_BASE ?>/usuarios" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow-sm col-md-8 mx-auto">
            <div class="card-body p-4">
                <form action="<?= URL_BASE ?>/usuarios/salvar" method="post">
                    <div class="mb-3">
                        <label for="nomeUsuario" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" value="<?= $usuario['nomeUsuario'] ?? '' ?>">
                        <?php if (isset($erros['nomeUsuario'])): ?>
                            <div class="text-danger small"><?= $erros['nomeUsuario'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email'] ?? '' ?>">
                        <?php if (isset($erros['email'])): ?>
                            <div class="text-danger small"><?= $erros['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                        <?php if (isset($erros['senha'])): ?>
                            <div class="text-danger small"><?= $erros['senha'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="perfil" class="form-label">Perfil</label>
                        <select class="form-select" id="perfil" name="perfil">
                            <option value="user" <?= (isset($usuario['perfil']) && $usuario['perfil'] == 'user') ? 'selected' : '' ?>>Usuário Padrão</option>
                            <option value="admin" <?= (isset($usuario['perfil']) && $usuario['perfil'] == 'admin') ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-circle"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>