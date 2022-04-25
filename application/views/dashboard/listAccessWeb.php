<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-code"></i> <?php echo $titulo_pagina ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <?php echo anchor('web/adicionarweb', '<i class="fas fa-plus-circle"></i> <span>Adicionar Acesso Web</span>', array('class' => 'btn btn-outline-success')) ?>
            </div>
        </div>
    </div>


    <section id="error-area">
        <div class="row">
            <div class="col-12 col-sm-12">
                <?= $this->session->userdata('msg', array('class' => 'mb-5')); ?>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-12 col-sm-12">
            <table id="mainTable" class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acessosweb as $w) { ?>
                        <tr>
                            <td scope="row"> <?= $w->nome_cliente ?></td>
                            <td><?= $w->tipo_acesso ?></td>
                            <td><?= $w->login ?></td>
                            <td><?= $this->encrypt->decode($w->senha); ?></td>
                            <td class="text-center"><?= ($w->ativo == 1 ? '<span class="badge rounded-pill bg-success"> Ativo</span>' : '<span class="badge rounded-pill bg-danger">Inativo</span>') ?></td>
                            <td class="text-center">
                                <?= anchor('web/editarweb/' . $w->id, '<i class="fas fa-pencil-alt"></i>', array('title' => 'Editar')) ?>
                                <?= anchor('web/deletarweb/' . $w->id, '<i class="fas fa-trash-alt"></i>', array('title' => 'Excluir')) ?>
                                <?php if ($w->ativo == 1) { ?>
                                    <?= anchor('web/webinativo/' . $w->id, '<i class="fas fa-toggle-on"></i>', array('title' => 'Desativar')) ?>
                                <?php } else { ?>
                                    <?= anchor('web/webativo/' . $w->id, '<i class="fas fa-toggle-off"></i>', array('title' => 'Ativar')) ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>