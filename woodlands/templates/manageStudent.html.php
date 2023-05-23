<form class="form" method="POST" action="">
    
    <label for="student_id">Student ID:</label>
    <input type="text" name="student[students_id]" id="student_id" value="<?= $student->students_id ?? '' ?>" placeholder="Student ID" required data-field-name="Student ID">

    <label for="first_name">First Name:</label>
    <input type="text" name="student[firstname]" id="first_name" value="<?= $student->firstname ?? '' ?>" placeholder="First name" required data-field-name="First Name">

    <label for="middle_name">Middle Name:</label>
    <input type="text" name="student[middlename]" id="middle_name" value="<?= $student->middlename ?? '' ?>" placeholder="Middle name">

    <label for="surname">Surname:</label>
    <input type="text" name="student[surname]" id="surname" value="<?= $student->surname ?? '' ?>" placeholder="Surname" required data-field-name="Surname">

    <label for="dob">Date of Birth:</label>
    <input type="date" name="student[dob]" id="dob" value="<?= $student->dob ?? '' ?>" placeholder="Date of birth" required data-field-name="Date of Birth">

    <label for="phone">Phone Number:</label>
    <input type="text" name="student[phone]" id="phone" value="<?= $student->phone ?? '' ?>" placeholder="Phone number" required pattern="[0-9]{11}" data-field-name="Phone Number">

    <label for="status">Status:</label>
    <select name="student[status]" id="status" required data-field-name="Status">
        <?php if($student->status==="DORMANT"): ?>
            <option value="DORMANT" selected>DORMANT</option>
            <option value="LIVE">LIVE</option>
            <option value="PROSPECTIVE">PROSPECTIVE</option>
        <?php elseif($student->status==="LIVE"): ?>
            <option value="LIVE" selected>LIVE</option>
            <option value="PROSPECTIVE">PROSPECTIVE</option>
            <option value="DORMANT">DORMANT</option>
        <?php elseif($student->status==="PROSPECTIVE"): ?>
            <option value="PROSPECTIVE" selected>PROSPECTIVE</option>
            <option value="DORMANT">DORMANT</option>
            <option value="LIVE">LIVE</option>
        <?php else: ?>
            <option value="PROSPECTIVE">PROSPECTIVE</option>
            <option value="DORMANT">DORMANT</option>
            <option value="LIVE">LIVE</option>
        <?php endif; ?>
    </select>

    <label for="dormancy_reason">Dormancy Reason:</label>
    <input type="text" name="student[dormancy_reason]" id="dormancy_reason" value="<?= $student->dormancy_reason ?? '' ?>" placeholder="Dormancy reason">

    <label for="email">Email Address:</label>
    <input type="text" name="student[email]" id="email" value="<?= $student->email ?? '' ?>" placeholder="Email address" required data-field-name="Email Address">

    <label for="course_id">Course ID:</label>
    <input type="text" name="student[course_id]" id="course_id" value="<?= $student->course_id ?? '' ?>" placeholder="Course ID" required data-field-name="Course ID">

    <label for="term_street">Term-time Street:</label>
    <input type="text" name="student[term_street]" id="term_street" value="<?= $student->term_street ?? '' ?>" placeholder="Term-time street" required data-field-name="Term-time Street">

    <label for="term_town">Term-time Town:</label>
    <input type="text" name="student[term_town]" id="term_town" value="<?= $student->term_town ?? '' ?>" placeholder="Term-time town" required data-field-name="Term-time Town">

    <label for="term_postcode">Term-time Postcode:</label>
    <input type="text" name="student[term_postcode]" id="term_postcode" value="<?= $student->term_postcode ?? '' ?>" placeholder="Term-time postcode" required data-field-name="Term-time Postcode">

    <label for="home_address">Home Address:</label>
    <input type="text" name="student[home_address]" id="home_address" value="<?= $student->home_address ?? '' ?>" placeholder="Home address">

    <label for="home_town">Home Town:</label>
    <input type="text" name="student[home_town]" id="home_town" value="<?= $student->home_town ?? '' ?>" placeholder="Home town">

    <label for="home_postcode">Home Postcode:</label>
    <input type="text" name="student[home_postcode]" id="home_postcode" value="<?= $student->home_postcode ?? '' ?>" placeholder="Home postcode">

    <label for="password">Password(Leave blank if not updating):</label>
    <input type="password" name="student[password]" id="password" value="" placeholder="Password">

    <input type="submit" value="Submit">

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('.form');
            const inputs = form.querySelectorAll('input[required]');

            function validateInput(input) {
                if (input.value.trim() === '') {
                    input.classList.add('error');
                    input.setCustomValidity('Please fill in ' + input.getAttribute('data-field-name') + '.');
                } else {
                    input.classList.remove('error');
                    input.setCustomValidity('');
                }
                
                if (input.getAttribute('name') === 'student[phone]') {
                    const phoneRegex = /^[0-9]{11}$/;
                    const inputValue = input.value.trim();
                    if (!phoneRegex.test(inputValue)) {
                        input.classList.add('error');
                        input.setCustomValidity('Please enter an 11 digit phone number.');
                    }
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
