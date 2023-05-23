<form class="form" method="POST" action="">
    
    <label for="staff_id">Staff ID:</label>
    <input type="text" name="staff[staff_id]" id="staff_id" value="<?= $staffMember->staff_id ?? '' ?>" placeholder="Staff ID" required>

    <label for="status">Status:</label>
    <input type="text" name="staff[status]" id="status" value="<?= $staffMember->status ?? '' ?>" placeholder="Status" required>

    <label for="dormancy_reason">Dormancy Reason:</label>
    <input type="text" name="staff[dormancy_reason]" id="dormancy_reason" value="<?= $staffMember->dormancy_reason ?? '' ?>" placeholder="Dormancy reason">

    <label for="first_name">First Name:</label>
    <input type="text" name="staff[firstname]" id="first_name" value="<?= $staffMember->firstname ?? '' ?>" placeholder="First name" required>

    <label for="middle_name">Middle Name:</label>
    <input type="text" name="staff[middlename]" id="middle_name" value="<?= $staffMember->middlename ?? '' ?>" placeholder="Middle name">

    <label for="surname">Surname:</label>
    <input type="text" name="staff[surname]" id="surname" value="<?= $staffMember->surname ?? '' ?>" placeholder="Surname" required>

    <label for="phone">Phone Number:</label>
    <input type="text" name="staff[phone]" id="phone" value="<?= $staffMember->phone ?? '' ?>" placeholder="Phone number" required>

    <label for="email">Email Address:</label>
    <input type="text" name="staff[email]" id="email" value="<?= $staffMember->email ?? '' ?>" placeholder="Email address" required>

    <input type="submit" value="Submit">

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('.form');
            const inputs = form.querySelectorAll('input[required]');

            function validateInput(input) {
                if (input.value.trim() === '') {
                    input.classList.add('error');
                    input.setCustomValidity('Please fill in ' + input.getAttribute('placeholder') + '.');
                } else {
                    input.classList.remove('error');
                    input.setCustomValidity('');
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
