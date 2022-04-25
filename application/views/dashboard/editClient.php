<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 noPress"><i class="fas fa-pencil-alt"></i> <?php echo $titulo_pagina ?></h1>
    </div>

    <section id="error-area">
        <div class="row">
            <div class="col-12 col-sm-12">
                <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?= $this->session->userdata('msg'); ?>
            </div>
        </div>
    </section>

    <div class="row mb-4" id="onlyPrint">
        <div class="col-12 col-sm-12">
            <form action="clientes/editarficha/<?php echo ($query->id) ?>" method="POST">
                <div class="row">
                    <div class="col-6">
                        <label for="nomeCliente" class="form-label">Nome Cliente:</label>
                        <input type="text" class="form-control" name="nomeUnidade" id="nomeUnidade" value="<?php echo ($query->nomeUnidade) ?>">
                    </div>
                    <div class="col-6">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" value="<?php echo ($query->cnpj) ?>">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="dataInauguracao" class="form-label">Data de Inauguração</label>
                        <input type="date" class="form-control" name="dataInauguracao" id="dataInauguracao" value="<?php echo ($query->dataInauguracao) ?>">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="whatsapp" class="form-label">WhatsApp da Empresa</label>
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?php echo ($query->whatsapp) ?>">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="telFixo" class="form-label">Fixo da Empresa</label>
                        <input type="text" class="form-control" name="telFixo" id="telFixo" value="<?php echo ($query->telFixo) ?>">
                    </div>
                    <div style="margin: 5px 0;"></div>
                    <div class="col-3 mt-4">
                        <label for="funcSeg1" class="form-label">Horário de Abertura - Segunda</label>
                        <input type="time" class="form-control" name="funcSeg1" id="funcSeg1" value="<?php echo ($query->funcSeg1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcSeg2" class="form-label">Horário de Encerramento - Segunda</label>
                        <input type="time" class="form-control" name="funcSeg2" id="funcSeg2" value="<?php echo ($query->funcSeg2) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcTer1" class="form-label">Horário de Abertura - Terça</label>
                        <input type="time" class="form-control" name="funcTer1" id="funcTer1" value="<?php echo ($query->funcTer1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcTer2" class="form-label">Horário de Encerramento - Terça</label>
                        <input type="time" class="form-control" name="funcTer2" id="funcTer2" value="<?php echo ($query->funcTer2) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcQua1" class="form-label">Horário de Abertura - Quarta</label>
                        <input type="time" class="form-control" name="funcQua1" id="funcQua1" value="<?php echo ($query->funcQua1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcQua2" class="form-label">Horário de Encerramento - Quarta</label>
                        <input type="time" class="form-control" name="funcQua2" id="funcQua2" value="<?php echo ($query->funcQua2) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcQui1" class="form-label">Horário de Abertura - Quinta</label>
                        <input type="time" class="form-control" name="funcQui1" id="funcQui1" value="<?php echo ($query->funcQui1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcQui2" class="form-label">Horário de Encerramento - Quinta</label>
                        <input type="time" class="form-control" name="funcQui2" id="funcQui2" value="<?php echo ($query->funcQui2) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcSex1" class="form-label">Horário de Abertura - Sexta</label>
                        <input type="time" class="form-control" name="funcSex1" id="funcSex1" value="<?php echo ($query->funcSex1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcSex2" class="form-label">Horário de Encerramento - Sexta</label>
                        <input type="time" class="form-control" name="funcSex2" id="funcSex2" value="<?php echo ($query->funcSex2) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcSab1" class="form-label">Horário de Abertura - Sábado</label>
                        <input type="time" class="form-control" name="funcSab1" id="funcSab1" value="<?php echo ($query->funcSab1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcSab2" class="form-label">Horário de Encerramento - Sábado</label>
                        <input type="time" class="form-control" name="funcSab2" id="funcSab2" value="<?php echo ($query->funcSab2) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcDom1" class="form-label">Horário de Abertura - Domingo</label>
                        <input type="time" class="form-control" name="funcDom1" id="funcDom1" value="<?php echo ($query->funcDom1) ?>">
                    </div>
                    <div class="col-3 mt-4">
                        <label for="funcDom2" class="form-label">Horário de Encerramento - Domingo</label>
                        <input type="time" class="form-control" name="funcDom2" id="funcDom2" value="<?php echo ($query->funcDom2) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" value="<?php echo ($query->cep) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="logradouro" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo ($query->logradouro) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" value="<?php echo ($query->numero) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo ($query->complemento) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo ($query->bairro) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo ($query->cidade) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="uf" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="uf" id="uf" value="<?php echo ($query->uf) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="igUsuario" class="form-label">Usuário Instagram</label>
                        <input type="text" class="form-control" name="igUsuario" id="igUsuario" value="<?php echo ($query->igUsuario) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="igSenha" class="form-label">Senha Instagram</label>
                        <input type="text" class="form-control" name="igSenha" id="igSenha" value="<?php echo $this->encrypt->decode(($query->igSenha)); ?>">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="fbPagina" class="form-label">Página Facebook</label>
                        <input type="text" class="form-control" name="fbPagina" id="fbPagina" value="<?php echo ($query->fbPagina) ?>">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="fbUrl" class="form-label">URL Página Facebook</label>
                        <input type="text" class="form-control" name="fbUrl" id="fbUrl" value="<?php echo ($query->fbUrl) ?>">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="IdConta" class="form-label">ID Conta de Anúncios</label>
                        <input type="text" class="form-control" name="IdConta" id="IdConta" value="<?php echo ($query->IdConta) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="ytUsuario" class="form-label">Login YouTube</label>
                        <input type="text" class="form-control" name="ytUsuario" id="ytUsuario" value="<?php echo ($query->ytUsuario) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="ytSenha" class="form-label">Senha YouTube</label>
                        <input type="text" class="form-control" name="ytSenha" id="ytSenha" value="<?php echo $this->encrypt->decode(($query->ytSenha)); ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="ttUsuario" class="form-label">Login Twitter</label>
                        <input type="text" class="form-control" name="ttUsuario" id="ttUsuario" value="<?php echo ($query->ttUsuario) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="ttSenha" class="form-label">Senha Twitter</label>
                        <input type="text" class="form-control" name="ttSenha" id="ttSenha" value="<?php echo $this->encrypt->decode(($query->ttSenha)); ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="pinUsuario" class="form-label">Login Pinterest</label>
                        <input type="text" class="form-control" name="pinUsuario" id="pinUsuario" value="<?php echo ($query->pinUsuario) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="pinSenha" class="form-label">Senha Pinterest</label>
                        <input type="text" class="form-control" name="pinSenha" id="pinSenha" value="<?php echo $this->encrypt->decode(($query->pinSenha)); ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="acessoMateriais" class="form-label">Acesso a Materiais</label>
                        <input type="text" class="form-control" name="acessoMateriais" id="acessoMateriais" value="<?php echo ($query->acessoMateriais) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="acessoSite" class="form-label">Acesso a Site</label>
                        <input type="text" class="form-control" name="acessoSite" id="acessoSite" value="<?php echo ($query->acessoSite) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="formaPagamento" class="form-label">Forma de Pagamento</label>
                        <input type="text" class="form-control" name="formaPagamento" id="formaPagamento" value="<?php echo ($query->formaPagamento) ?>">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="investimento" class="form-label">Valor do Investimento Mensal</label>
                        <input type="text" class="form-control" name="investimento" id="investimento" value="<?php echo ($query->investimento) ?>">
                    </div>
                    <div class="col-12 mt-4">
                        <input type="hidden" id="idFichaCliente" name="idFichaCliente" value="<?php echo ($query->id) ?>">
                        <button type="submit" class="btn btn-outline-success">Atualizar Ficha</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>