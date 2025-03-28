@isset($Annonce)


    <div class="col-12 col-lg-12">
        <div class="row align-items-center my-4">
            <div class="col">
                <h2 class="page-title">Capa Actual</h2>
            </div>

        </div>
        <div class="card-deck mb-4">

            <div class="card border-0 bg-transparent">
                <div class="card-img-top img-fluid rounded"
                    style='background-image:url("/storage/{{ $Annonce->path }}");background-position:center;background-size:cover;height:200px;'>
                </div>

            </div> <!-- .card -->


        </div> <!-- .card-deck -->
    </div>
@endisset

<div class="col-md-12">
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" value="{{ isset($Annonce->title) ? $Annonce->title : '' }}"
            class="form-control border-secondary" placeholder="Titulo" required>
    </div>
</div> <!-- /.col -->
<div class="col-md-8">
    <div class="form-group">
        <label for="subtitle">Subtitulo</label>
        <input type="text" name="subtitle" id="subtitle"
            value="{{ isset($Annonce->subtitle) ? $Annonce->subtitle : '' }}" class="form-control border-secondary"
            placeholder="Subtitulo" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-4">
    <div class="form-group">
        <label for="date">Date de Inserção</label>
        <input type="date" name="date" id="date" value="{{ isset($Annonce->date) ? $Annonce->date : '' }}"
            class="form-control border-secondary" required>
    </div>
</div> <!-- /.col -->


<div class="col-md-4">
    <div class="form-group">
        <label for="state">Estado do Anúncio</label>
        <select class="form-control border-dark" id="state" name="state" required>

            @if (isset($Annonce->state))
                <option value="{{ $Annonce->state }}" class="text-primary h6">
                    {{ $Annonce->state }}
                </option>
            @else
                <option selected disabled value="">Selecione o estado do Anúncio</option>
            @endif
            <option value="Autorizada">Autorizada</option>
            <option value="Não Autorizada">Não Autorizada</option>
        </select>
    </div>
</div> <!-- /.col -->



<div class="col-md-8">
    <div class="form-group">
        <label for="typewriter">Autor do Anúncio</label>
        <input type="text" name="typewriter" id="typewriter"
            value="{{ isset($Annonce->typewriter) ? $Annonce->typewriter : '' }}"
            class="form-control border-secondary" placeholder="Autor da Matéria" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-12">
    <div class="form-group">
        <div class="custom-file">
            <label class="form-label border-secondary" for="image">Selecione a Capa</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="image">

        </div>
    </div>
</div> <!-- /.col -->

<div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Corpo do Anúncio</h5>
            <p>Digite o corpo do Anúncio</p>
            <!-- Create the editor container -->
            <textarea name="body" id="editor1" style="min-height:300px; min-width:100%">
           {{ isset($Annonce->body) ? $Annonce->body : '' }}
            </textarea>
        </div>
    </div>
</div>
