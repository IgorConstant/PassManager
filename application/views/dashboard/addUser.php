<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-users"></i> <?php echo $titulo_pagina ?></h1>
    </div>

    <div class="col-12 col-sm-12">
        <?php
        echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>')
        ?>


        <?php
        echo form_open();

        echo '<div class="form-group">';
        echo form_label('Nome', 'id_nome');
        echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'nome', 'id' => 'id_nome', 'autocomplete' => 'off'));
        echo '</div>';

        //Input para E-mail
        echo '<div class="form-group">';
        echo form_label('E-mail', 'id_email');
        echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'email', 'id' => 'id_email', 'autocomplete' => 'off'));
        echo '</div>';

        //Input para Senha
        echo '<div class="form-group">';
        echo form_label('Senha', 'id_senha');
        echo form_input(array('type' => 'password', 'class' => 'form-control', 'name' => 'senha', 'id' => 'id_senha', 'autocomplete' => 'off'));
        echo '</div>';

        //Input para Repita sua Senha
        echo '<div class="form-group">';
        echo form_label('Repita sua Senha', 'id_senha2');
        echo form_input(array('type' => 'password', 'class' => 'form-control', 'name' => 'senha2', 'id' => 'id_senha2', 'autocomplete' => 'off'));
        echo '</div>';


        //Button
        echo form_submit('submit', 'Cadastrar Usuário', array('class' => 'btn btn-outline-success'));

        echo form_close();
        ?>
    </div>
</main>