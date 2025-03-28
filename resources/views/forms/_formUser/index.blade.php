@csrf


<div class="form-row">
    <div class="form-group col-12 col-md-6 col-lg-3">
        <label for="name">Nome</label>
        <input type="text" class="form-control" placeholder="Nome" id="name" name="name"
            value="{{ isset($user->name) ? $user->name : old('name') }}" required autofocus />
    </div>
    <div class="form-group col-12 col-md-6 col-lg-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" id="email" name="email"
            value="{{ isset($user->email) ? $user->email : old('email') }}" required />
    </div>

    <div class="form-group col-12 col-md-6 col-lg-3">
        <label for="level">Nivel de Acesso</label>
        <select name="level" id="level" class="form-control" required>
            @if (isset($user->level))
                <option value="{{ $user->level }}" class="text-primary h6" selected>
                    {{ $user->level }}
                </option>
            @else
                <option disabled selected>selecione o nivel de acesso</option>
            @endif

            @if (Auth::user()->level == 'Administrador')
                <option value="Administrador">Administrador</option>
                <option value="Editor">Editor</option>
                <option value="Recrutador">Recrutador</option>
                <option value="Examinador">Examinador</option>

            @endif

        </select>
    </div>
    <div class="form-group col-12 col-md-6 col-lg-3">
        <label for="province_ref">Provincia</label>
        <select name="province_ref" id="province_ref" class="form-control">

            @if (isset($user->province->name))
                <option value="{{ $user->province_ref }}" class="text-primary h6" selected>
                    {{ $user->province->name }}
                </option>
            @else
                <option disabled selected>selecione uma opção</option>
            @endif

            @foreach ($provinces as $row)
                <option value="{{ $row->ref }}">{{ $row->name }}</option>
            @endforeach
            <option value="NACIONAL">NACIONAL</option>

        </select>
    </div>

</div>
<hr class="my-4">
<div class="row mb-4">
    <div class="col-md-6">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" class="form-control" name="password"
                autocomplete="new-password" placeholder="Password"  />
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Confirmar Password"  />
        </div>
    </div>
    <div class="col-md-6">
        <b class="mb-2 text-dark">Requisitos de senhas</b>
        <p class="small text-dark mb-2"> Para criar uma nova senha, você deve atender a todos os seguintes requisitos:
        </p>
        <ul class="small text-dark pl-4 mb-0">
            <li>Mínimo 11 caracteres</li>
            <li>Pelo menos um caracter especial</li>
            <li>Pelo menos um número</li>
            <li>Pelo menos uma letra maiúscula e uma letra minúscula</li>
        </ul>
    </div>
</div>
