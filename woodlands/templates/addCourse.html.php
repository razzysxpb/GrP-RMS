<form method="POST" id="courseForm">
    <label for="courses_id">Course ID:</label>
    <input type="text" name="course[courses_id]" id="courses_id">
    <label for="name">Name:</label>
    <input type="text" name="course[name]" id="name">
    <input type="submit" value="Submit">
</form>

<script>
    const form = document.getElementById('courseForm');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const coursesIdInput = document.getElementById('courses_id');
        const nameInput = document.getElementById('name');

        const coursesIdValue = coursesIdInput.value.trim();
        const nameValue = nameInput.value.trim();

        if (coursesIdValue === '' || nameValue === '') {
            alert('Please fill in all fields.');
        } else {
            const confirmProceed = confirm('Are you sure you want to proceed?');

            if (confirmProceed) {
                // Submit the form or perform any desired action
                form.submit();
            }
        }
    });
</script>
