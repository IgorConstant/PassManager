<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-pencil-alt"></i> <?php echo $titulo_pagina ?></h1>
    </div>

    <section id="error-area">
        <div class="row">
            <div class="col-12 col-sm-12">
                <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?= $this->session->userdata('msg'); ?>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-12 col-sm-12">
            <form action="acessos/editarcliente/<?php echo ($query->id) ?>" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nomeCliente" class="form-label">Nome Cliente:</label>
                        <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" value="<?php echo ($query->nome_cliente) ?>">
                    </div>
                    <div class="col-6">
                        <label for="tipoAcesso" class="form-label">Tipo do Acesso</label>
                        <select id="tipoAcesso" name="tipoAcesso" class="form-select">
                            <option><?php echo ($query->tipo_acesso) ?></option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Google Account">Google Account</option>
                            <option value="Twitter">Twitter</option>
                            <option value="TikTok">TikTok</option>
                            <option value="BitLy">BitLy</option>
                            <option value="Linktree">Linktree</option>
                            <option value="Spotify">Spotify</option>
                        </select>
                    </div>
                    <div class="col-6 mt-4">
                        <label for="loginCliente" class="form-label">Login:</label>
                        <input type="text" class="form-control" name="loginCliente" id="loginCliente" value="<?php echo ($query->login) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="senhaCliente" class="form-label">Senha:</label>
                        <input type="text" class="form-control" name="senhaCliente" id="senhaCliente" value="<?php echo $this->encrypt->decode(($query->senha)); ?>">
                    </div>
                    <div class="col-12 mt-4">
                        <div class="mb-3">
                            <label for="infoAdicional" class="form-label">Informações Adicionais</label>
                            <textarea class="form-control summernote" id="infoAdicional" name="infoAdicional" rows="3"><?php echo ($query->adicional) ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" id="idAcesso" name="idAcesso" value="<?php echo ($query->id) ?>">
                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>