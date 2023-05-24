<form class="form" method="POST" action="">
    
<input type="hidden" name="announcement[announcement_id]" value="<?= $announcement->announcement_id ?? '' ?>" />

    <label for="title">Title:</label>
    <input  type="text" name="announcement[title]" id="title" value="<?= $announcement->title ?? '' ?>" placeholder="Title" required>

    <label for="description">Description:</label>
    <textarea name="announcement[description]" id="description" placeholder="Description" required><?= $announcement->description ?? '' ?></textarea>

    <label for="date">Date:</label>
    <input type="date" name="announcement[date]" id="date" value="<?= $announcement->date ?? '' ?>" required>

    <!-- Add more announcement fields here -->
    <input type="hidden" name = "announcement[modules_id]" value="<?=$_GET['module_id']??$announcement->modules_id?>" />

    <input type="submit" value="Submit">

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('.form');
            const inputs = form.querySelectorAll('input[required], textarea[required]');

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
