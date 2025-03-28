<div class="col-md-6">
    <div class="form-group">
        <label for="title">Titulo </label>
        <input type="text" name="title" id="title" value="{{ isset($regulament->title) ? $regulament->title : '' }}"
            class="form-control border-secondary" placeholder="Titulo do regulamento" required>
    </div>
</div> <!-- /.col -->

<div class="col-md-6">
    <div class="form-group">
        <label for="file">Arquivo </label>
        <input type="file" name="file" id="file" class="form-control border-secondary">
    </div>
</div> <!-- /.col -->
