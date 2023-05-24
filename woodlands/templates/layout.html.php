<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="/styles.css"/>
  <title><?=$title?></title>

</head>

  <header>
  <img src="/images/log.jpg" alt="Logo" /><h1>Woodlands University Record Management System</h1>
  <?php if(isset($_SESSION['loggedin'])){ ?>
  <button class="logout"><a href = "/staff/logout" >Log Out</a></button>
  <?php }else{ ?>
    <button class="logout"><a href = "/staff/login" >Log In</a></button>
  <?php } ?>
  </header>

  <div class="sidebar">
  <a href="/staff/home" id="home"><div><img src="/images/home.png" alt="Home" /><h2> Home</h2></div></a>
  <a href="/staff/staffList" id="staffList"><div><img src="/images/team.png" alt="Staff List" /><h2> View Staff</h2></div></a>
  <a href="/students/manageStudent" id="manageStudent"><div><img src="/images/add_student.png" alt="Add student" /><h2>Add Student</h2></div></a>
  <a href="/students/studentList" id="studentList"><div><img src="/images/students.png" alt="Student list" /><h2>View Students</h2></div></a>
  <a href="/courses/courses" id="courses"><div><img src="/images/course.png" alt="Courses List" /><h2> Courses</h2></div></a>
  <a href="/modules/modules" id="modules"><div><img src="/images/modules.png" alt="Modules List" /><h2> Modules</h2></div></a>
  <a href="/announcements/announcements" id="announcements"><div><img src="/images/announcement.png" alt="Announcements List" /><h2> Announcements</h2></div></a>
  <a href="/messages/messages" id="messages"><div><img src="/images/message.png" alt="Messages List" /><h2> Messages</h2></div></a>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname;

    const menuItems = document.querySelectorAll('.sidebar a');
    menuItems.forEach((menuItem) => {
      const menuItemPath = menuItem.getAttribute('href');

      if (currentPath === menuItemPath) {
        menuItem.style.backgroundColor = 'green';
      }
    });
  });
</script>
  <body>
  <div class="content">
    <div class="main">
    <?=$output?>
</div>
  </div>

  <footer>
    <!-- Footer content -->
  </footer>
</body>
</html>
