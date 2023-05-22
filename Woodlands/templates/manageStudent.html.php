<form class="form" method="POST" action="">
    <label for="student_id">Student ID:</label>
    <input type="text" name="student[students_id]" id="student_id" value="<?=$_GET['id']??''?>" placeholder="Student ID" required>

    <label for="first_name">First Name:</label>
    <input type="text" name="student[firstname]" id="first_name" value="<?=$_GET['firstname']??''?>" placeholder="First name" required>

    <label for="middle_name">Middle Name:</label>
    <input type="text" name="student[middlename]" id="middle_name" value="<?=$_GET['middlename']??''?>" placeholder="Middle name">

    <label for="surname">Surname:</label>
    <input type="text" name="student[surname]" id="surname" value="<?=$_GET['surname']??''?>" placeholder="Surname" required>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="student[dob]" id="dob" value="<?=$_GET['dob']??''?>" placeholder="Date of birth" required>

    <label for="phone">Phone Number:</label>
    <input type="text" name="student[phone]" id="phone" value="<?=$_GET['phone']??''?>" placeholder="Phone number" required pattern="[0-9]{10}">

    <label for="status">Status:</label>
    <input type="text" name="student[status]" id="status" value="<?=$_GET['status']??''?>" placeholder="Status" required>

    <label for="dormancy_reason">Dormancy Reason:</label>
    <input type="text" name="student[dormancy_reason]" id="dormancy_reason" value="<?=$_GET['dormancy_reason']??''?>" placeholder="Dormancy reason">

    <label for="email">Email Address:</label>
    <input type="text" name="student[email]" id="email" value="<?=$_GET['email']??''?>" placeholder="Email address" required>

    <label for="course_id">Course ID:</label>
    <input type="text" name="student[course_id]" id="course_id" value="<?=$_GET['course_id']??''?>" placeholder="Course ID" required>

    <label for="term_street">Term-time Street:</label>
    <input type="text" name="student[term_street]" id="term_street" value="<?=$_GET['term_street']??''?>" placeholder="Term-time street" required>

    <label for="term_town">Term-time Town:</label>
    <input type="text" name="student[term_town]" id="term_town" value="<?=$_GET['term_town']??''?>" placeholder="Term-time town" required>

    <label for="term_postcode">Term-time Postcode:</label>
    <input type="text" name="student[term_postcode]" id="term_postcode" value="<?=$_GET['term_postcode']??''?>" placeholder="Term-time postcode" required>

    <label for="home_address">Home Address:</label>
    <input type="text" name="student[home_address]" id="home_address" value="<?=$_GET['home_address']??''?>" placeholder="Home address">

    <label for="home_town">Home Town:</label>
    <input type="text" name="student[home_town]" id="home_town" value="<?=$_GET['home_town']??''?>" placeholder="Home town">

    <label for="home_postcode">Home Postcode:</label>
    <input type="text" name="student[home_postcode]" id="home_postcode" value="<?=$_GET['home_postcode']??''?>" placeholder="Home postcode">

    <label for="password">Password:</label>
    <input type="password" name="student[password]" id="password" value="" placeholder="Password" required>

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