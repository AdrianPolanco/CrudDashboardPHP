<form class="col-4 needs-validation" method="<?= $formAction->method ?>" action="<?= $formAction->action ?>" novalidate>
    <h3 class="text-<?= $formTitle->color ?> text-center"><?= $formTitle->title ?></h3>
    <?php foreach ($formFields as $field) : ?>
        <div class="mb-3">
            <?php if ($field->type !== 'hidden') : ?>
                <label for="<?= $field->inputName ?>" class="form-label"><?= $field->name ?></label>
            <?php endif; ?>
            <?php if ($field->type === 'date') : ?>
                <input type="<?= $field->type ?>" class="form-control" name="<?= $field->inputName ?>" required max="<?= $field->pattern ?>" <?= ($field->value !== null) ? "value='$field->value'" : "" ?>>
            <?php elseif ($field->type === "hidden") : ?>
                <input type="<?= $field->type ?>" name="<?= $field->inputName ?>" value="<?= $field->value ?>" />
            <?php elseif ($field->type === 'select') : ?>
                <select class="form-select" aria-label="Seleccionar habilidad" name=<?= $field->selectName ?>>
                    <?php foreach ($field->options as $option) : ?>
                        <option value="<?= $option->optionValue ?>" <?= ($option->optionValue == $field->value) ? 'selected' : '' ?>><?= $option->optionName ?> </option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <input type="<?= $field->type ?>" class="form-control" name="<?= $field->inputName ?>" required pattern="<?= $field->pattern ?>" minlength="<?= $field->minLength ?>" placeholder="<?= $field->placeholder ?>" <?= ($field->value !== null) ? "value='$field->value'" : "" ?>>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-<?= $formTitle->color ?> enabled" id="submitBtn" disabled>Registrar</button>
    </div>

</form>
<script>
    (function() {
        'use strict';

        const form = document.querySelector('.needs-validation');
        const submitBtn = document.getElementById('submitBtn');

        function validateForm() {
            if (form.checkValidity() === false) {
                submitBtn.disabled = true;
                submitBtn.classList.remove('enabled');
            } else {
                submitBtn.disabled = false;
                submitBtn.classList.add('enabled');
            }
        }

        form.addEventListener('input', validateForm, false);
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    })();
</script>