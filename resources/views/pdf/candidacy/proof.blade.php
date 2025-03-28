<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovativo de Inscrição {{ $candidacy->bi }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 200px;
        }

        .content {
            padding: 20px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
        }

        .footer img {
            max-width: 500px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="images/logotipo/logo.png" alt="Logotipo">
        <h1>Comprovativo de Inscrição</h1>
    </div>
    <div class="content">
        <h2>Dados Pessoais</h2>
        <p><strong>Nome:</strong> {{ $candidacy->fullname }}</p>
        <p><strong>Bilhete de Identidade:</strong> {{ $candidacy->bi }}</p>
        <p><strong>Província onde deseja Trabalhar:</strong> {{ $candidacy->province->name }}</p>
        <p><strong>Município onde deseja Trabalhar:</strong> {{ $candidacy->county }}</p>
        <p><strong>Data de Nascimento:</strong>
            {{ date('d/m/Y', strtotime($candidacy->birthdate)) }} -
            {{ date('Y') - date('Y', strtotime($candidacy->birthdate)) }} anos
        </p>
        <p><strong>Residência Actual:</strong>
            {{ $candidacy->residence }}
        </p>
        <p><strong>Telefone:</strong> {{ $candidacy->tel }}</p>
        <p><strong>Email:</strong> {{ $candidacy->email }}</p>
        <p><strong>Nível Académico:</strong> {{ $candidacy->qualification }}</p>
        <p><strong>IBAN:</strong> {{ $candidacy->iban }}</p>
        <br>
        <h2>Habilidades Profissionais e Humanas</h2>
       
        <ul>
            @if (!is_null($candidacy->hph))
                @php
                    $hphArray = json_decode($candidacy->hph);
                @endphp
                @if (is_array($hphArray) && count($hphArray) > 0)
                    @foreach ($hphArray as $hph)
                        <li>{{ $hph }}</li>
                    @endforeach
                @else
                    <i>--- NÃO SELECIONOU NENHUMA HABILIDADE ---</i>
                @endif
            @else
                <i>--- NÃO SELECIONOU NENHUMA HABILIDADE ---</i>
            @endif

        </ul>
    </div>
    <div class="footer">
        <img src="images/logotipo/org.png" alt="Logo 1" width="450px">
        <img src="data:image/png;base64,{!! base64_encode($qrcode) !!}">

    </div>
</body>

</html>
