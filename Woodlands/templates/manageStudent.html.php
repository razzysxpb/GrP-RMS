
<form method="POST" action ="">
    <input type = "text" name="student[students_id]" value = "<?=$_GET['id']??''?>"/>
    <input type = "text" name = "student[firstname]" value ="<?=$_GET['firstname']??''?>" >
    <input type = "text" name = "student[middlename]" value ="<?=$_GET['middlename']??''?>" >
    <input type = "text" name = "student[surname]" value ="<?=$_GET['surname']??''?>" >
    <input type = "date" name = "student[dob]" value ="<?=$_GET['dob']??''?>" >
    <input type = "text" name = "student[phone]" value ="<?=$_GET['phone']??''?>" >
    <input type = "text" name = "student[status]" value ="<?=$_GET['status']??''?>" >
    <input type = "text" name = "student[dormancy_reason]" value ="<?=$_GET['dormancy_reason']??''?>" >
    <input type = "text" name = "student[email]" value ="<?=$_GET['email']??''?>" >
    <input type = "text" name = "student[course_id]" value ="<?=$_GET['course_id']??''?>" >
    <input type = "text" name = "student[term_street]" value ="<?=$_GET['term_street']??''?>" >
    <input type = "text" name = "student[term_town]" value ="<?=$_GET['term_town']??''?>" >
    <input type = "text" name = "student[term_postcode]" value ="<?=$_GET['term_postcode']??''?>" >
    <input type = "text" name = "student[home_address]" value ="<?=$_GET['home_address']??''?>" >
    <input type = "text" name = "student[home_town]" value ="<?=$_GET['home_town']??''?>" >
    <input type = "text" name = "student[home_postcode]" value ="<?=$_GET['home_postcode']??''?>" >
    <input type = "text" name = "student[password]" value ="" >
    <input type = "submit" value="Submit" />
</form>

