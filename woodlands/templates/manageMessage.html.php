<form class="form" method="POST" action="">
    
<input type="hidden" name="message[message_id]" value="<?= $message->message_id ?? '' ?? '' ?>" />

    <label for="title">Title:</label>
    <input type="text" name="message[title]" id="title" value="<?= $message->title ?? '' ?>" placeholder="Title" required>

    <label for="description">Description:</label>
    <textarea name="message[description]" id="description" placeholder="Description" required><?= $message->description ?? '' ?></textarea>

    <label for="date">Date:</label>
    <input type="date" name="message[date]" id="date" value="<?= $message->date ?? '' ?>" required>

    <!-- Add more message fields here -->

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
