<div class="col-12 col-md-12 col-lg-12">
    <label for="question">Questão:</label>
    <input type="text" id="question" name="question" class="form-control border-secondary" placeholder="Questão"
        required>
</div>

<div class="col-12 col-md-12 col-lg-12 my-5">
    <label>Respostas:</label>
    @for ($i = 0; $i < 5; $i++)
        <div class="row">
            <div class="col-12 col-md-10 col-lg-10 mt-2">
                <input type="text" name="answers[]" class="form-control border-secondary" placeholder="Digite a resposta" required>
            </div>
            <div class="col-12 col-md-2 col-lg-2 mt-2">
                <input type="radio" name="correct_answer" class="form-control border-secondary"
                    value="{{ $i }}" {{ $i == 0 ? 'checked' : '' }}>
            </div>
        </div>
    @endfor
</div>
