<form class="form" method="POST" action="">
    <?php if (!empty($students)): ?>
        <?php $student = $students[0]; ?>
        <label for="student_id">Student ID:</label>
        <input type="text" name="student[students_id]" id="student_id" value="<?= $student->students_id ?? '' ?>" placeholder="Student ID" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="student[firstname]" id="first_name" value="<?= $student->firstname ?? '' ?>" placeholder="First name" required>

        <label for="middle_name">Middle Name:</label>
        <input type="text" name="student[middlename]" id="middle_name" value="<?= $student->middlename ?? '' ?>" placeholder="Middle name">

        <label for="surname">Surname:</label>
        <input type="text" name="student[surname]" id="surname" value="<?= $student->surname ?? '' ?>" placeholder="Surname" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="student[dob]" id="dob" value="<?= $student->dob ?? '' ?>" placeholder="Date of birth" required>

        <label for="phone">Phone Number:</label>
        <input type="text" name="student[phone]" id="phone" value="<?= $student->phone ?? '' ?>" placeholder="Phone number" required pattern="[0-9]{10}">

        <label for="status">Status:</label>
        <input type="text" name="student[status]" id="status" value="<?= $student->status ?? '' ?>" placeholder="Status" required>

        <label for="dormancy_reason">Dormancy Reason:</label>
        <input type="text" name="student[dormancy_reason]" id="dormancy_reason" value="<?= $student->dormancy_reason ?? '' ?>" placeholder="Dormancy reason">

        <label for="email">Email Address:</label>
        <input type="text" name="student[email]" id="email" value="<?= $student->email ?? '' ?>" placeholder="Email address" required>

        <label for="course_id">Course ID:</label>
        <input type="text" name="student[course_id]" id="course_id" value="<?= $student->course_id ?? '' ?>" placeholder="Course ID" required>

        <label for="term_street">Term-time Street:</label>
        <input type="text" name="student[term_street]" id="term_street" value="<?= $student->term_street ?? '' ?>" placeholder="Term-time street" required>

        <label for="term_town">Term-time Town:</label>
        <input type="text" name="student[term_town]" id="term_town" value="<?= $student->term_town ?? '' ?>" placeholder="Term-time town" required>

        <label for="term_postcode">Term-time Postcode:</label>
        <input type="text" name="student[term_postcode]" id="term_postcode" value="<?= $student->term_postcode ?? '' ?>" placeholder="Term-time postcode" required>

        <label for="home_address">Home Address:</label>
        <input type="text" name="student[home_address]" id="home_address" value="<?= $student->home_address ?? '' ?>" placeholder="Home address">

        <label for="home_town">Home Town:</label>
        <input type="text" name="student[home_town]" id="home_town" value="<?= $student->home_town ?? '' ?>" placeholder="Home town">

        <label for="home_postcode">Home Postcode:</label>
        <input type="text" name="student[home_postcode]" id="home_postcode" value="<?= $student->home_postcode ?? '' ?>" placeholder="Home postcode">

        <label for="password">Password:</label>
        <input type="password" name="student[password]" id="password" value="" placeholder="Password" required>
    <?php endif; ?>

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
