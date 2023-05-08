<form method="POST" action="">
    <input type="text" name="student[students_id]" value="<?=$_GET['id']??''?>" placeholder="Student ID">
    <input type="text" name="student[firstname]" value="<?=$_GET['firstname']??''?>" placeholder="First name">
    <input type="text" name="student[middlename]" value="<?=$_GET['middlename']??''?>" placeholder="Middle name">
    <input type="text" name="student[surname]" value="<?=$_GET['surname']??''?>" placeholder="Surname">
    <input type="date" name="student[dob]" value="<?=$_GET['dob']??''?>" placeholder="Date of birth">
    <input type="text" name="student[phone]" value="<?=$_GET['phone']??''?>" placeholder="Phone number">
    <input type="text" name="student[status]" value="<?=$_GET['status']??''?>" placeholder="Status">
    <input type="text" name="student[dormancy_reason]" value="<?=$_GET['dormancy_reason']??''?>" placeholder="Dormancy reason">
    <input type="text" name="student[email]" value="<?=$_GET['email']??''?>" placeholder="Email address">
    <input type="text" name="student[course_id]" value="<?=$_GET['course_id']??''?>" placeholder="Course ID">
    <input type="text" name="student[term_street]" value="<?=$_GET['term_street']??''?>" placeholder="Term-time street">
    <input type="text" name="student[term_town]" value="<?=$_GET['term_town']??''?>" placeholder="Term-time town">
    <input type="text" name="student[term_postcode]" value="<?=$_GET['term_postcode']??''?>" placeholder="Term-time postcode">
    <input type="text" name="student[home_address]" value="<?=$_GET['home_address']??''?>" placeholder="Home address">
    <input type="text" name="student[home_town]" value="<?=$_GET['home_town']??''?>" placeholder="Home town">
    <input type="text" name="student[home_postcode]" value="<?=$_GET['home_postcode']??''?>" placeholder="Home postcode">
    <input type="text" name="student[password]" value="" placeholder="Password">
    <input type="submit" value="Submit">
</form>
