<div class="col-md-12">
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" value="{{ isset($definitions->title) ? $definitions->title : '' }}"
            class="form-control border-secondary" placeholder="Titulo" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-12 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Corpo da Definição</h5>
            <p>Digite o corpo da Definição</p>
            <!-- Create the editor container -->
            <textarea name="definicon" id="editor1"  style="min-height:300px; min-width:100%">
       {{ isset($definitions->definicon) ? $definitions->definicon : '' }}
        </textarea>
        </div>
    </div>
</div>
