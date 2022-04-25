<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-file-alt"></i> <?php echo $titulo_pagina ?></h1>
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
                        <th>CNPJ</th>
                        <th>Nome Cliente</th>
                        <th>Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $c) { ?>
                        <tr>
                            <td><?= $c->cnpj ?></td>
                            <td scope="row"> <?= $c->nomeUnidade ?></td>
                            <td class="text-center"><?= ($c->ativo == 1 ? '<span class="badge rounded-pill bg-success"> Ativo</span>' : '<span class="badge rounded-pill bg-danger">Inativo</span>') ?></td>
                            <td class="text-center">
                                <?= anchor('clientes/editarficha/' . $c->id, '<i class="fas fa-file-edit"></i>', array('title' => 'Editar')) ?>
                                <?= anchor('clientes/deletarficha/' . $c->id, '<i class="fas fa-file-excel"></i>', array('title' => 'Excluir')) ?>
                                <?php if ($c->ativo == 1) { ?>
                                    <?= anchor('clientes/fichainativa/' . $c->id, '<i class="fas fa-toggle-on"></i>', array('title' => 'Desativar')) ?>
                                <?php } else { ?>
                                    <?= anchor('clientes/fichaativa/' . $c->id, '<i class="fas fa-toggle-off"></i>', array('title' => 'Ativar')) ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>