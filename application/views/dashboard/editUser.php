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

        //Input para Nome
        echo '<div class="form-group">';
        echo form_label('Nome', 'id_nome');
        echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'nome', 'id' => 'id_nome', 'autocomplete' => 'off', 'placeholder' => 'Nome', 'value' => $query->nome));
        echo '</div>';

        //Input para E-mail
        echo '<div class="form-group">';
        echo form_label('E-mail', 'id_email');
        echo form_input(array('type' => 'text', 'value' => $query->email, 'class' => 'form-control', 'name' => 'email', 'id' => 'id_email', 'autocomplete' => 'off'));
        echo '</div>';

        echo '<div class="form-group">';
        echo form_label('Senha', 'id_senha');
        echo form_input(array('type' => 'password', 'value' => $query->senha, 'class' => 'form-control', 'name' => 'senha', 'id' => 'id_senha', 'autocomplete' => 'off'));
        echo '</div>';

        echo form_hidden('id', $query->id);

        //Button
        echo form_submit('submit', 'Editar Usuário', array('class' => 'btn btn-outline-success'));

        echo form_close();
        ?>

    </div>

</main>