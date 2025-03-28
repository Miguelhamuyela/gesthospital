<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pass/bootstrap.min.css">

    <title>CAC - {{ $candidacy->bi }}</title>

    <style>
        * {
            margin: 0 0 0 0;
            padding: 0px;
            font-family: "Open Sans", sans-serif !important;
            text-transform: uppercase !important;

        }
    </style>
</head>

<body style="background-image: url('images/publish/background.jpg')">

    <header>
        <div class="row" style="margin-top: 30px;">
            <div class="col-xs-6 text-center">
                <img src="images/logotipo/logo-pass.png" width="140px">
            </div>

            <div class="col-xs-6 text-left">
                <img style="margin-left: -20px;margin-top:20px;" src="storage/{{ $candidacy->photo }}" width="150px">
            </div>
        </div>

    </header>

    <section class="text-center mx-auto" style="margin-top: 10px;">
        <h4>

            @php
                // Dividir a string em partes usando o espaço como delimitador
                $partesNome = explode(' ', $candidacy->fullname);

                $provinceName = $candidacy->province->name;

                //Obter a primeira letra do primeiro nome do candidato
                $firstNameLetter = mb_substr($partesNome[0], 0, 1);

                // Obter a primeira letra do último nome do candidato
                $lastNameLetter = mb_substr(end($partesNome), 0, 1);

                // Obter a primeira letra do nome da província
                $firstProvinceLetter = mb_substr($provinceName, 0, 1);

                // Obter a última letra do nome da província
                $lastProvinceLetter = mb_substr($provinceName, -1, 1);

                // Concatenar as letras da província
                $provinceInitials = $firstProvinceLetter . $lastProvinceLetter;


            @endphp

            {{ $provinceInitials . '0000' . $candidacy->id . $firstNameLetter . $lastNameLetter }}

        </h4><br>
        <div style="background-color: #fff;margin-top: -15px; padding: 10px;">
            <h2 class="text-dark">
                <b>
                    {!! $partesNome[0] . ' ' . end($partesNome) !!}
                </b>
            </h2>
            <h5><b>AGENTE DE CAMPO</b></h5>

        </div>
    </section>
    <section class="" style="margin-top: 10px; background-color: #fff; padding-bottom:10px;">

        <div class="row">
            <div class="col-xs-8 text-center" style="margin-top:15px;">
                <small style=" text-transform:initial !important; font-weight: bold">Validade: 19 de Julho a 19 de
                    Dezembro de 2024</small>

                <img src="images/logotipo/org.png" style="margin-top: 30px" width="100%">
            </div>

            <div class="col-xs-4 text-left">
                <img style="margin-left: -20px;margin-top:20px;" src="data:image/png;base64,{!! base64_encode($qrcode) !!}">
            </div>
        </div>

    </section>
    <footer style="margin-top:10px;" class="text-center">
        <small style="font-size: 8.3px">

            <b>
                <img src="images/icons/tel.png" width="15px"> Rua Ho-Chi-Minh; C.P. nº 1215, (+244) 945 73 89 38 /
                (+244) 945 73 89 06 <br>
                <img src="images/icons/email.png" width="15px"> geral@ine.gov.ao / inegeral9@gmail.com /
                www.ine.gov.ao | Luanda - Angola
            </b>

        </small>
    </footer>
</body>

</html>
