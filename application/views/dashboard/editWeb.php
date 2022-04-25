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
            <form action="web/editarweb/<?php echo ($query->id) ?>" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nomeWeb" class="form-label">Nome Cliente:</label>
                        <input type="text" class="form-control" name="nomeWeb" id="nomeWeb" value="<?php echo ($query->nome_cliente) ?>">
                    </div>
                    <div class="col-6">
                        <label for="webAcesso" class="form-label">Tipo do Acesso</label>
                        <select id="webAcesso" name="webAcesso" class="form-select">
                            <option selected><?php echo ($query->tipo_acesso) ?></option>
                            <option value="FTP">FTP</option>
                            <option value="Hospedagem">Hospedagem</option>
                            <option value="Registro.BR">Registro.br</option>
                            <option value="Wordpress">Wordpress</option>
                            <option value="Duda">Duda</option>
                            <option value="Great Pages">Great Pages</option>
                            <option value="Tray">Tray e-commerce</option>
                            <option value="Loja Integrada">Loja Integrada</option>
                            <option value="Bling">Bling</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <div class="col-6 mt-4">
                        <label for="loginWeb" class="form-label">Login:</label>
                        <input type="text" class="form-control" name="loginWeb" id="loginWeb" value="<?php echo ($query->login) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="senhaWeb" class="form-label">Senha:</label>
                        <input type="text" class="form-control" name="senhaWeb" id="senhaWeb" value="<?php echo $this->encrypt->decode(($query->senha)); ?>">
                    </div>
                    <div class="col-12 mt-4">
                        <div class="mb-3">
                            <label for="infoAdicionalWeb" class="form-label">Informações Adicionais</label>
                            <textarea class="form-control summernote" id="infoAdicionalWeb" name="infoAdicionalWeb" rows="3"><?php echo ($query->adicional) ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" id="idWeb" name="idWeb" value="<?php echo ($query->id) ?>">
                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>