<?php
namespace woodlands;
class Routes implements \central\Routes {
	private $categoryController;
	public function getController($name) {
		require '../database.php';
		$staffTable = new \central\DatabaseTable($pdo, 'staff', 'staff_id');
		$qualificationsTable = new \central\DatabaseTable($pdo, 'qualifications', 'qualifications_id');
		$attendanceTable = new \central\DatabaseTable($pdo, 'attendance', 'attendance_id');
		$studentAssignmentsTable = new \central\DatabaseTable($pdo, 'student_assignments', 'student_assignment_id');
        $courseModuleTable = new \central\DatabaseTable($pdo, 'course_module', 'course_module_id');
        $personalTutorialTable = new \central\DatabaseTable($pdo, 'personal_tutorials', 'personal_tutorials_id');
        $personalTutorsTable = new \central\DatabaseTable($pdo,'personal_tutors','personal_tutors_id');
        $moduleStaffTable = new \central\DatabaseTable($pdo, 'module_staff', 'module_staff_id');
		$assignmentsTable = new \central\DatabaseTable($pdo, 'assignments', 'assignments_id');
		$modulesTable = new \central\DatabaseTable($pdo, 'modules', 'module_id','\woodlands\Entities\Modules',[$staffTable, $moduleStaffTable]);
		$coursesTable = new \central\DatabaseTable($pdo, 'courses', 'courses_id','\woodlands\Entities\Courses',[$modulesTable, $courseModuleTable]);
		$studentsTable = new \central\DatabaseTable($pdo, 'students', 'students_id','\woodlands\Entities\Students',[$qualificationsTable,$coursesTable,$personalTutorialTable,$modulesTable,$attendanceTable,$staffTable]);
		$staffTable = new \central\DatabaseTable($pdo, 'staff', 'staff_id', '\woodlands\Entities\Staff',[$qualificationsTable,$coursesTable,$personalTutorialTable,$modulesTable,$attendanceTable,$studentsTable]);
		$announcementsTable = new \central\DatabaseTable($pdo, 'announcements', 'announcement_id','\woodlands\Entities\Announcements',[$modulesTable]);
		// $announcements = new \woodlands\Entities\Announcements($announcementsTable);
		$messagesTable = new \central\DatabaseTable($pdo, 'messages', 'message_id');


        $controllers =[];
		$controllers['students']= new \woodlands\Controllers\students($studentsTable);
		$controllers['staff'] = new \woodlands\Controllers\staff($staffTable);
		$controllers['courses'] = new \woodlands\Controllers\courses($coursesTable);
		$controllers['modules'] = new \woodlands\Controllers\modules($modulesTable);
		$controllers['announcements'] = new \woodlands\Controllers\announcements($announcementsTable);
		$controllers['messages'] = new \woodlands\Controllers\messages($messagesTable);

		
	
		return $controllers[$name];
	}

	
	
    public function getDefaultRoute() {
        return 'staff/home';
        }

		public function checkLogin($route)
	{
		$loginRoutes = [];
		// Staff related pages
		$loginRoutes['staff/home'] = true;
		$loginRoutes['staff/manageStaff'] = true;
		$loginRoutes['staff/manageStaffSubmit'] = true;
		$loginRoutes['staff/staffList'] = true;
		$loginRoutes['staff/deleteSubmit'] = true;
		$loginRoutes['staff/logout'] = true;
		// Student related pages
		$loginRoutes['students/manageStudent'] = true;
		$loginRoutes['students/manageStudentSubmit'] = true;
		$loginRoutes['students/studentList'] = true;
		$loginRoutes['students/deleteSubmit'] = true;
		// Modules related pages
		$loginRoutes['modules/modules'] = true;
		$loginRoutes['modules/manageModule'] = true;
		$loginRoutes['modules/manageModuleSubmit'] = true;
		$loginRoutes['modules/deleteSubmit'] = true;
		// Messages related pages
		$loginRoutes['messages/messages'] = true;
		$loginRoutes['messages/manageMessage'] = true;
		$loginRoutes['messages/manageMessageSubmit'] = true;
		$loginRoutes['messages/deleteSubmit'] = true;
		// Courses related pages
		$loginRoutes['courses/courses'] = true;
		$loginRoutes['courses/manageCourse'] = true;
		$loginRoutes['courses/manageCourseSubmit'] = true;
		$loginRoutes['courses/deleteSubmit'] = true;
		// Announcements related pages
		$loginRoutes['announcements/announcements'] = true;
		$loginRoutes['announcements/manageAnnouncement'] = true;
		$loginRoutes['announcements/manageAnnouncementSubmit'] = true;
		$loginRoutes['announcements/deleteSubmit'] = true;

		$requiresLogin = $loginRoutes[$route] ?? false;
		if ($requiresLogin && !isset($_SESSION['loggedin'])) {
			header('location: /staff/login');
			exit();
		}
	}
	public function checkAdmin($route)
	{
		$loginRoutes = [];
		// Staff related pages
		$loginRoutes['staff/home'] = true;
		$loginRoutes['staff/manageStaff'] = true;
		$loginRoutes['staff/manageStaffSubmit'] = true;
		$loginRoutes['staff/staffList'] = true;
		$loginRoutes['staff/deleteSubmit'] = true;
		// Student related pages
		$loginRoutes['students/manageStudent'] = true;
		$loginRoutes['students/manageStudentSubmit'] = true;
		$loginRoutes['students/studentList'] = true;
		$loginRoutes['students/deleteSubmit'] = true;
		// Modules related pages
		$loginRoutes['modules/modules'] = true;
		$loginRoutes['modules/manageModule'] = true;
		$loginRoutes['modules/manageModuleSubmit'] = true;
		$loginRoutes['modules/deleteSubmit'] = true;
		// Messages related pages
		$loginRoutes['messages/messages'] = true;
		$loginRoutes['messages/manageMessage'] = true;
		$loginRoutes['messages/manageMessageSubmit'] = true;
		$loginRoutes['messages/deleteSubmit'] = true;
		// Courses related pages
		$loginRoutes['courses/courses'] = true;
		$loginRoutes['courses/manageCourse'] = true;
		$loginRoutes['courses/manageCourseSubmit'] = true;
		$loginRoutes['courses/deleteSubmit'] = true;
		// Announcements related pages
		$loginRoutes['announcements/announcements'] = true;
		$loginRoutes['announcements/manageAnnouncement'] = true;
		$loginRoutes['announcements/manageAnnouncementSubmit'] = true;
		$loginRoutes['announcements/deleteSubmit'] = true;

		$requiresAdmin = $loginRoutes[$route] ?? false;
		if ($requiresAdmin && (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin'])) {
			header('location: /staff/login');
			exit();
		}
	}
   
}