<div class="row py-5">
    <div class="col-md-4">
        <hr>
    </div>
    <div class="col-md-4 text-center">
        <b>Dados Pessoais</b>
    </div>
    <div class="col-md-4">
        <hr>
    </div>
</div>

<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="province_id">Província onde deseja Trabalhar <small class="text-danger">*</small></label>

        <select name="province_id" id="province_id" class="form-control" onchange="getprovince(this.value)" required>
            <option disabled selected>Selecione uma província</option>

            @foreach ($provinces as $item)
                <option value="{{ $item->ref }}">{{ $item->name }}</option>
            @endforeach

        </select>
    </div>
</div>

<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group" id="wrapper-county">
        <label for="county">Município onde deseja Trabalhar <small class="text-danger">*</small></label>
        <select name="county" id="county" class="form-control" required>

        </select>
    </div>
</div>

<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="bi">Nº do Bilhete de Identidade <small class="text-danger">*</small></label>
        <input type="text" class="form-control" placeholder="Ex:. 000123321LA000" value="{{ old('bi') }}"
            autofocus name="bi" id="bi" required>
    </div>
</div>

<div class="col-md-6 col-lg-8 col-12">
    <div class="form-group">
        <label for="fullname">Nome Completo <small class="text-danger">*</small></label>
        <input type="text" class="form-control" value="{{ old('fullname') }}" name="fullname" id="fullname"
            placeholder="Nome Completo" required>
    </div>
</div>

<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="birthdate">Data de Nascimento <small class="text-danger">*</small></label>
        <input type="date" class="form-control" value="{{ old('birthdate') }}" name="birthdate" id="birthdate"
            required>
    </div>
</div>

<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="residence">Residência Actual <small class="text-danger">*</small></label>
        <input type="text" class="form-control" value="{{ old('residence') }}" name="residence"
            placeholder="Local de Residência actual" id="residence" required>
    </div>
</div>
<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="tel">Telefone <small class="text-danger">*</small></label>
        <input type="number" class="form-control" placeholder="Ex:. +244900000000" value="{{ old('tel') }}"
            name="tel" id="tel" required>
    </div>
</div>
<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="qualification">Nível Académico <small class="text-danger">*</small></label>
        <select name="qualification" id="qualification" class="form-control" required>
            <option disabled selected>Selecione uma opção</option>

            <option value="Ensino Médio Concluído">Ensino Médio Concluído</option>
            <option value="Frequência Universitária">Frequência Universitária</option>
            <option value="Formação Universitária Concluída">Formação Universitária Concluída</option>
        </select>
    </div>
</div>

<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="email">Email Pessoal <small class="text-danger">*</small></label>
        <input type="email" class="form-control" placeholder="Ex:. usuario@servidor.dominio"
            value="{{ old('email') }}" name="email" id="email" required>
    </div>
</div>
<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="email_confirmation">Confirmar Email <small class="text-danger">*</small></label>
        <input type="email" name="email_confirmation" id="email_confirmation"
            value="{{ isset($registration->email) ? $registration->email : old('email') }}" class="form-control"
            placeholder="E-mail" required>
    </div>
</div> <!-- /.col -->



<div class="col-md-6 col-lg-4 col-12">
    <div class="form-group">
        <label for="iban">IBAN <small>(International Bank Account Number)</small> <small
                class="text-danger">*</small></label>
        <input type="text" class="form-control" value="{{ old('iban') }}"
            placeholder="AO06.XXXX.0000.XXXX.XXXX.XXXX.X" name="iban" id="iban" required>
        <small class="text-danger"><i>O IBAN deve estar associado ao nome do Candidato</i></small>

    </div>
</div>

<div class="row py-5">
    <div class="col-md-2">
        <hr>
    </div>
    <div class="col-md-8 text-center">
        <b>Habilidades Profissionais e Humanas<br>
            <small>Selecione todas as opções que se aplicam a você marcando as caixas de seleção correspondentes</small>
        </b>
    </div>
    <div class="col-md-2">
        <hr>
    </div>
</div>


<div class="col-12 mt-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hph[]"
            value="Possuo conhecimentos e habilidades em MS Office, especialmente Word e Excel" id="p1">
        <label class="form-check-label" for="p1">
            Possuo conhecimentos e habilidades em MS Office, especialmente Word e Excel;
        </label>
    </div>
</div>

<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hph[]"
            value="Tenho capacidades para trabalhar em condições ambientais extremas" id="p2">
        <label class="form-check-label" for="p2">
            Tenho capacidades para trabalhar em condições ambientais extremas;
        </label>
    </div>
</div>
<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hph[]"
            value="Tenho disponibilidade imediata e a tempo inteiro para participar nas formações e na recolha de dados, incluindo o final de semana e feriados"
            id="p3">
        <label class="form-check-label" for="p3">
            Tenho disponibilidade imediata e a tempo inteiro para participar nas formações e na recolha de dados,
            incluindo o final de semana e feriados;
        </label>
    </div>
</div>
<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hph[]"
            value="Conheço bem a língua local onde pretendo trabalhar" id="p4">
        <label class="form-check-label" for="p4">
            Conheço bem a língua local onde pretendo trabalhar;
        </label>
    </div>
</div>

<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hph[]"
            value="Participei em Censos e/ou em inquéritos realizado pelo INE" id="p5">
        <label class="form-check-label" for="p5">
            Participei em Censos e/ou em inquéritos realizado pelo INE;
        </label>
    </div>
</div>


{{-- docs --}}
<div class="row py-5">
    <div class="col-md-3">
        <hr>
    </div>
    <div class="col-md-6 text-center">
        <b> Anexo dos Documentos Escaneados <br>
            <small>Deve carregar electronicamente os seguintes documentos</small>
        </b>
    </div>
    <div class="col-md-3">
        <hr>
    </div>
</div>

<div class="col-12 pt-3">
    <div class="form-group">
        <label class="form-label" for="doc_qualification">
            Certificado de Habilitações Literárias ou outro documento que ateste o Nível Académico <small
                class="text-danger">*</small><br>
            <small class="text-danger"> (Tamanho Máximo: 5MB | Extensões permitidas: pdf, jpg, jpeg, png)</small>
        </label>
        <input type="file" class="form-control" name="doc_qualification" id="doc_qualification"
            value="{{ old('doc_qualification') }}" required>
    </div>
</div> <!-- /.col -->



<div class="col-12 pt-3">
    <div class="form-group">
        <label class="form-label" for="doc_iban">
            Detalhes da Conta onde apresenta o IBAN <small>(Solicite o documento no banco ou tire pelo seu Internet
                Banking)</small> <small class="text-danger">*</small><br>

            <small class="text-danger"> (Tamanho Máximo: 5MB | Extensões permitidas: pdf, jpg, jpeg, png)</small>
        </label>
        <input type="file" class="form-control" name="doc_iban" id="doc_iban" value="{{ old('doc_iban') }}"
            required>

    </div>
</div> <!-- /.col -->
<div class="col-12 pt-3">
    <div class="form-group">
        <div class="custom-file">
            <label class="form-label" for="photo">Fotografia de Identificação <small>(A foto precisa estar no
                    modelo abaixo)</small> <small class="text-danger">*</small></label>
            <input type="file" class="form-control" name="photo" value="{{ old('photo') }}" id="photo"
                required>
            <small class="text-danger">
                Insira uma fotografia do tipo passe, actualizada e colorida.
                A fotografia será utilizada para Impressão do Credencial de Identificação.
            </small> <br>
            <small class="text-danger">
                Extensões Permitidas: jpg, png, jpeg || Tamanho Máximo: 5MB
                <br>
            </small>

            <img src="/site/images/modelphoto.png" width="50%" class="d-none d-lg-block">
            <img src="/site/images/modelphoto.png" width="100%" class="d-block d-lg-none">

        </div>
    </div>
</div> <!-- /.col -->


{{-- google recaptcha --}}
<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
    <div class="col-md-12">
        {!! RecaptchaV3::field('register') !!}
        @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif
    </div>
</div>
