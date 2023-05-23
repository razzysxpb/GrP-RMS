<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="/styles.css"/>
  <title><?=$title?></title>

</head>

  <header>
  <img src="/images/logo.jpg" alt="Logo" /><h1>Woodlands University Record Management System</h1>
  </header>

  <div class="sidebar">
    <a href="/staff/home"><div><img src="/images/home.png" alt="Home" /><h2> Home</h2></div></a>
    <a href="/staff/staffList"><div><img src="/images/team.png" alt="Staff List" /><h2> View Staff</h2></div></a>
    <a href="/students/manageStudent"><div><img src="/images/add_student.png" alt="Add student" /><h2>Add Student</h2></div></a>
    <a href="/students/studentList"><div><img src="/images/students.png" alt="Student list" /><h2>View Students</h2></div></a>
    <a href="/courses/courses"><div><img src="/images/team.png" alt="Staff List" /><h2> Courses</h2></div></a>
    <a href="/modules/modules"><div><img src="/images/team.png" alt="Staff List" /><h2> Modules</h2></div></a>
  </div>
  <body>
  <div class="content">
    <?=$output?>
  </div>

  <footer>
    <!-- Footer content -->
  </footer>
</body>
</html>
