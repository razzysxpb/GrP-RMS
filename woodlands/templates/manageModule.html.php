<form class="form" method="POST" action="">
    <?php $module = isset($modules[0]) ? $modules[0] : null; ?>
    <label for="module_id">Module ID:</label>
    <input type="text" name="module[module_id]" id="module_id" value="<?= $module->module_id ?? '' ?>" placeholder="Module ID" required>

    <label for="name">Name:</label>
    <input type="text" name="module[name]" id="name" value="<?= $module->name ?? '' ?>" placeholder="Name" required>

    <label for="module_year">Module Year:</label>
    <input type="text" name="module[module_year]" id="module_year" value="<?= $module->module_year ?? '' ?>" placeholder="Module Year" required>


    <input type="submit" value="Submit">

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('.form');
            const inputs = form.querySelectorAll('input[required]');

            function validateInput(input) {
                if (input.checkValidity()) {
                    input.classList.remove('error');
                } else {
                    input.classList.add('error');
                }
            }

            function validateForm() {
                inputs.forEach((input) => {
                    validateInput(input);
                });
            }

            inputs.forEach((input) => {
                input.addEventListener('input', () => {
                    validateInput(input);
                });
            });

            form.addEventListener('submit', (e) => {
                validateForm();

                if (!form.checkValidity()) {
                    e.preventDefault();
                }
            });

            validateForm(); // Perform initial validation
        });
    </script>
</form>
