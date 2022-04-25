<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Ficha Cadastral - Cliente Duetto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- FavIcon -->
    <link rel="icon" type="image/png" href="https://www.duetto.ag/wp-content/uploads/2020/07/cropped-favicon-32x32.png" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/iconic/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/animsition/css/animsition.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/select2/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/noui/nouislider.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <section id="error-area">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                        <?= $this->session->userdata('msg'); ?>
                    </div>
                </div>
            </section>

            <form method="POST" action="<?php echo base_url('clientes/adicionarficha') ?>" class="contact100-form validate-form">
                <span class="contact100-form-title">
                    Dados da Empresa
                </span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input bg1" data-validate="Por favor, informe o nome da empresa.">
                    <span class="label-input100">Nome da empresa *</span>
                    <input class="input100" type="text" name="nomeUnidade" id="nomeUnidade" placeholder="Nome fantasia">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Por favor, informe o CNPJ da empresa.">
                    <span class="label-input100">CNPJ *</span>
                    <input class="input100" type="text" name="cnpj" id="cnpj" placeholder="Informe o CNPJ da empresa">
                    <script type="text/javascript">
                        $("#cnpj").mask("99.999.999/9999-99");
                    </script>
                </div>

                <div class="wrap-input100 bg1 wrap-input100">
                    <span class="label-input100">Data de inauguração</span>
                    <input class="input100" type="date" name="dataInauguracao" id="dataInauguracao">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">WhatsApp da empresa</span>
                    <input class="input100" type="text" name="whatsapp" id="whatsapp" placeholder="Informe o DDD + WhatsApp da empresa">
                    <script type="text/javascript">
                        $("#whatsapp").mask("(99)99999-9999");
                    </script>
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Fixo da empresa</span>
                    <input class="input100" type="text" name="telFixo" id="telFixo" placeholder="Informe o DDD + telefone fixo da empresa">
                    <script type="text/javascript">
                        $("#telFixo").mask("(99)9999-9999");
                    </script>
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Horário de Funcionamento</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Segunda Início *</span>
                    <input class="input100" type="time" name="funcSeg1" id="funcSeg1" min="00:00" max="23:59">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Segunda Término *</span>
                    <input class="input100" type="time" name="funcSeg2" id="funcSeg2" min="00:00" max="23:59">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Terça Início *</span>
                    <input class="input100" type="time" name="funcTer1" id="funcTer1">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Terça Término *</span>
                    <input class="input100" type="time" name="funcTer2" id="funcTer2">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Quarta Início *</span>
                    <input class="input100" type="time" name="funcQua1" id="funcQua1">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Quarta Término *</span>
                    <input class="input100" type="time" name="funcQua2" id="funcQua2">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Quinta Início *</span>
                    <input class="input100" type="time" name="funcQui1" id="funcQui1">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Quinta Término *</span>
                    <input class="input100" type="time" name="funcQui2" id="funcQui2">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Sexta Início *</span>
                    <input class="input100" type="time" name="funcSex1" id="funcSex1">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Campo obrigatório.">
                    <span class="label-input100">Sexta Término *</span>
                    <input class="input100" type="time" name="funcSex2" id="funcSex2">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Sábado Início</span>
                    <input class="input100" type="time" name="funcSab1" id="funcSab1">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Sábado Término</span>
                    <input class="input100" type="time" name="funcSab2" id="funcSab2">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Domingo Início</span>
                    <input class="input100" type="time" name="funcDom1" id="funcDom1">
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Domingo Término</span>
                    <input class="input100" type="time" name="funcDom2" id="funcDom2">
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Endereço completo da empresa</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Por favor, informe o CEP da empresa.">
                    <span class="label-input100">CEP *</span>
                    <input class="input100" type="text" id="cep" name="cep" minlength="8" maxlength="8" placeholder="Informe o CEP da empresa">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Por favor, informe o logradouro da empresa.">
                    <span class="label-input100">Logradouro *</span>
                    <input class="input100" type="text" id="logradouro" name="logradouro" placeholder="Informe o logradouro da empresa">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Por favor, informe o número da empresa.">
                    <span class="label-input100">Número *</span>
                    <input class="input100" type="text" id="numero" name="numero" placeholder="Informe o número da empresa">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Complemento</span>
                    <input class="input100" type="text" id="complemento" name="complemento" placeholder="Informe o complemento da empresa, se existir">
                </div>

                <div class="wrap-input100 bg1 rsl-wrap-input100 validate-input" data-validate="Por favor, informe o bairro da empresa.">
                    <span class="label-input100">Bairro *</span>
                    <input class="input100" type="text" id="bairro" name="bairro" placeholder="Informe o bairro da empresa">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Por favor, informe a cidade da empresa.">
                    <span class="label-input100">Cidade *</span>
                    <input class="input100" type="text" id="cidade" name="cidade" placeholder="Informe a cidade da empresa">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100 validate-input" data-validate="Por favor, informe o estado da empresa.">
                    <span class="label-input100">Estado *</span>
                    <input class="input100" type="text" id="uf" name="uf" placeholder="Informe o estado da empresa">
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Dados de acesso do Instagram</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 alert alert-warning label-input100" role="alert">
                    <i class="fa fa-exclamation-circle"></i> Caso não tenha o perfil da empresa criado, deixe em branco!
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Usuário</span>
                    <input class="input100" type="text" name="igUsuario" id="igUsuario" placeholder="Informe o usuário do Instagram">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Senha</span>
                    <input class="input100" type="password" id="igSenha" name="igSenha" placeholder="Informe a senha do Instagram"><i style="position: absolute; right: 10px; cursor: pointer; top: 50px" id="olho" class="fa fa-eye m-l-7" aria-hidden="true"></i>
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Dados da página comercial do Facebook</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 alert alert-warning label-input100" role="alert">
                    <i class="fa fa-exclamation-circle"></i> Caso não tenha a página comercial da empresa criada, deixe em branco!
                </div>

                <div class="wrap-input100 bg1 wrap-input100">
                    <span class="label-input100">Página</span>
                    <input class="input100" type="text" name="fbPagina" id="fbPagina" placeholder="Informe o nome da página comercial do Facebook">
                </div>

                <div class="wrap-input100 bg1 wrap-input100">
                    <span class="label-input100">Link (URL)</span>
                    <input class="input100" type="text" name="fbUrl" id="fbUrl" placeholder="Informe o link da página comercial do Facebook">
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Dados da conta de anúncios do Facebook</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>


                <div class="wrap-input100 bg1 wrap-input100">
                    <span class="label-input100">ID da conta de anúncios</span>
                    <input class="input100" type="number" name="IdConta" id="IdConta" placeholder="Informe o número de identificação da conta de anúncios">
                </div>

                <div class="wrap-input100 alert alert-success" role="alert">
                    <a class="label-input100 alert-success" href="https://www.facebook.com/ads/manager/account_settings/information/" target="_blank"><i class="fa fa-archive"></i> Clique e saiba onde encontrar o ID da conta de anúncios.</a>
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Acesso ao linkedin</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 alert alert-success" role="alert">
                    <i class="fa fa-warning"></i> Para nos liberar o acesso adicione em sua conta do linkedin os emails: <a href="https://www.linkedin.com/in/paulacirelli/" target="_blank">paula.cirelli@gmail.com</a>
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Dados de acesso para demais redes</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Usuário Youtube</span>
                    <input class="input100" type="text" name="ytUsuario" id="ytUsuario" placeholder="Informe o usuário do Youtube">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Senha Youtube</span>
                    <input class="input100" type="password" id="ytSenha" name="ytSenha" placeholder="Informe a senha do Youtube"><i style="position: absolute; right: 10px; cursor: pointer; top: 50px" id="olho" class="fa fa-eye m-l-7" aria-hidden="true"></i>
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Usuário Twitter</span>
                    <input class="input100" type="text" name="ttUsuario" id="ttUsuario" placeholder="Informe o usuário do Twitter">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Senha Twitter</span>
                    <input class="input100" type="password" id="ttSenha" name="ttSenha" placeholder="Informe a senha do Twitter"><i style="position: absolute; right: 10px; cursor: pointer; top: 50px" id="olho" class="fa fa-eye m-l-7" aria-hidden="true"></i>
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Usuário Pinterest</span>
                    <input class="input100" type="text" name="pinUsuario" id="pinUsuario" placeholder="Informe o usuário do Pinterest">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Senha Pinterest</span>
                    <input class="input100" type="password" id="pinSenha" name="pinSenha" placeholder="Informe a senha do Pinterest"><i style="position: absolute; right: 10px; cursor: pointer; top: 50px" id="olho" class="fa fa-eye m-l-7" aria-hidden="true"></i>
                </div>

                <div class="wrap-input100 bg0"><span class="label-input100">Dados de acesso em materiais</span><i class="fa fa-long-arrow-down m-l-7" aria-hidden="true"></i></div>

                <div class="wrap-input100 bg1 wrap-input100">
                    <span class="label-input100">Informe os dados de acesso abaixo:</span>
                    <input class="input100" type="textarea" name="acessoMateriais" id="acessoMateriais" placeholder="Banco de imagem, lista de cliente, banco de vídeos...">
                </div>

                <div class="wrap-input100 bg1 wrap-input100">
                    <span class="label-input100">Informe os dados de acesso ao site:</span>
                    <input class="input100" type="textarea" name="acessoSite" id="acessoSite" placeholder="Painel do site, hospedagem, registro de domínio...">
                </div>

                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">Forma de pagamento *</span>
                    <div>
                        <select class="js-select2" name="formaPagamento" id="formaPagamento">
                            <option>Selecione a forma de pagamento dos anúncios</option>
                            <option>Cartão de Crédito</option>
                            <option>Boleto Bancário</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>

                <div class="w-full dis-none js-show-service">

                    <div class="wrap-input100 bg1 wrap-input100 validate-input" data-validate="Por favor, informe o investimento da empresa.">
                        <span class="label-input100">Valor de Investimento Mensal *</span>
                        <input class="input100" type="text" name="investimento" id="investimento" placeholder="Informe o investimento das campanhas">
                    </div>

                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit">
                        <span>
                            Enviar dados da empresa
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/animsition/js/animsition.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap/js/popper.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/select2/select2.min.js') ?>"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });


            $(".js-select2").each(function() {
                $(this).on('select2:close', function(e) {
                    if ($(this).val() == "Selecione a forma de pagamento dos anúncios") {
                        $('.js-show-service').slideUp();
                    } else {
                        $('.js-show-service').slideUp();
                        $('.js-show-service').slideDown();
                    }
                });
            });
        })
    </script>

    <script src="<?php echo base_url('assets/js/daterangepicker/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/countdowntime/countdowntime.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/noui/nouislider.min.js') ?>"></script>

    <script>
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [1000, 3900],
            connect: true,
            range: {
                'min': 1000,
                'max': 30000
            }
        });

        var skipValues = [
            document.getElementById('value-lower'),
            document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function(values, handle) {
            skipValues[handle].innerHTML = Math.round(values[handle]);
            $('.contact100-form-range-value input[name="investInicial"]').val($('#value-lower').html());
            $('.contact100-form-range-value input[name="investMaximo"]').val($('#value-upper').html());
        });
    </script>

    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>

    <script type="text/javascript">
        $("#cep").focusout(function() {
            //Início do Comando AJAX
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function(resposta) {
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#logradouro").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    $("#numero").focus();
                }
            });
        });
    </script>


    <script>
        let btn = document.querySelector('#olho');
        btn.addEventListener('click', function() {
            let input = document.querySelector('#igSenha');
            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
        });
    </script>
</body>

</html>