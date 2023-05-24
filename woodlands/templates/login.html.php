<main class="home">

<?php
if (isset($error)) {
    echo '<h3>' . $error . '</h3>';
} ?>

<form action="/staff/login" method="POST">
    <label>Staff ID: </label>
    <input type="text" name="staff[staff_id]" required><br>

    <label>Password: </label>
    <input type="password" name="staff[password]" required><br>

    <input type="submit" value="Login">
</form>

</main>