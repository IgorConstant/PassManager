<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-user-tie"></i> <?php echo $titulo_pagina ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <?php echo anchor('acessos/adicionarcliente', '<i class="fas fa-plus-circle"></i> <span>Adicionar Cliente</span>', array('class' => 'btn btn-outline-success')) ?>
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
                    <?php foreach ($acessos as $acesso) { ?>
                        <tr>
                            <td scope="row"> <?= $acesso->nome_cliente ?></td>
                            <td><?= $acesso->tipo_acesso ?></td>
                            <td><?= $acesso->login ?></td>
                            <td><?= $this->encrypt->decode($acesso->senha); ?></td>
                            <td class="text-center"><?= ($acesso->ativo == 1 ? '<span class="badge rounded-pill bg-success"> Ativo</span>' : '<span class="badge rounded-pill bg-danger">Inativo</span>') ?></td>
                            <td class="text-center">
                                <?= anchor('acessos/editarcliente/' . $acesso->id, '<i class="fas fa-pencil-alt"></i>', array('title' => 'Editar')) ?>
                                <?= anchor('acessos/deletarcliente/' . $acesso->id, '<i class="fas fa-trash-alt"></i>', array('title' => 'Excluir')) ?>
                                <?php if ($acesso->ativo == 1) { ?>
                                    <?= anchor('acessos/clienteinativo/' . $acesso->id, '<i class="fas fa-toggle-on"></i>', array('title' => 'Desativar')) ?>
                                <?php } else { ?>
                                    <?= anchor('acessos/clienteativo/' . $acesso->id, '<i class="fas fa-toggle-off"></i>', array('title' => 'Ativar')) ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>