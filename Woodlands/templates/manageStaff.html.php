<form method="POST" action="">
    <input type="text" name="staff[staff_id]" value="<?=$_GET['id']??''?>" placeholder="Staff ID">
    <input type="text" name="staff[status]" value="<?=$_GET['status']??''?>" placeholder="Status">
    <input type="text" name="staff[dormancy_reason]" value="<?=$_GET['dormancy_reason']??''?>" placeholder="Dormancy reason">
    <input type="text" name="staff[firstname]" value="<?=$_GET['firstname']??''?>" placeholder="First name">
    <input type="text" name="staff[middlename]" value="<?=$_GET['middlename']??''?>" placeholder="Middle name">
    <input type="text" name="staff[surname]" value="<?=$_GET['surname']??''?>" placeholder="Surname">
    <input type="text" name="staff[street]" value="<?=$_GET['term_street']??''?>" placeholder="Street">
    <input type="text" name="staff[town]" value="<?=$_GET['town']??''?>" placeholder="Town">
    <input type="text" name="staff[postcode]" value="<?=$_GET['postcode']??''?>" placeholder="Postcode">
    <input type="text" name="staff[phone]" value="<?=$_GET['phone']??''?>" placeholder="Phone number">
    <input type="text" name="staff[email]" value="<?=$_GET['email']??''?>" placeholder="Email address">
    <input type="text" name="staff[roles]" value="<?=$_GET['course_id']??''?>" placeholder="Course ID">
    <input type="text" name="staff[mod_leader]" value="<?=$_GET['home_address']??''?>" placeholder="Home address">
    <input type="text" name="staff[specialist_subject]" value="<?=$_GET['home_town']??''?>" placeholder="Home town">
    <input type="submit" value="Submit">
</form>