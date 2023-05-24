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

		// public function checkLogin($route) {
		// 	session_start();
		// 	$loginRoutes = [];
		// 	$loginRoutes['job/adminJobs'] = true;
		// 	$loginRoutes['job/adminJobsSubmit'] = true;
		// 	$loginRoutes['category/adminManageCategory'] = true;
		// 	$loginRoutes['category/adminManageCategorySubmit'] = true;
		// 	$loginRoutes['job/adminApplicants'] = true;
		// 	$loginRoutes['category/adminCategories'] = true;
		// 	$loginRoutes['job/deleteJob'] = true;
		// 	$loginRoutes['job/adminManageJob'] = true;
		// 	$loginRoutes['job/adminManageJobSubmit'] = true;
		// 	$loginRoutes['message/adminMessage'] = true;
		// 	$loginRoutes['job/adminJobArchive'] = true;
			
		// 	$superRoutes['admin/adminAdminList'] = true;
		// 	$superRoutes['admin/adminManageAdmin'] = true;
		// 	$superRoutes['admin/adminManageAdminSubmit'] = true;

		// 	$userRoutes['admin/adminHome'] = true;
		// 	$userRoutes['job/userJobs']=true;
		// 	$userRoutes['job/userApplicants']=true;
		// 	$userRoutes['job/userManageJob']=true;
		// 	$userRoutes['job/userManageJobSubmit']=true;
			
		// 	$requiresLogin = $loginRoutes[$route] ?? false;
		// 	$requiresSuper = $superRoutes[$route] ?? false;
		// 	$requiresUser = $userRoutes[$route] ?? false;
		// 	if ($requiresLogin && !isset($_SESSION['admin'])&& !isset($_SESSION['super'])) {
		// 	header('location: /admin/login');
		// 	exit();}
		// 	if ($requiresSuper && !isset($_SESSION['super'])) {
		// 		header('location: /admin/login');
		//    exit();
		// 	}
		// 	if ($requiresUser && !isset($_SESSION['user'])&& !isset($_SESSION['admin'])&& !isset($_SESSION['super'])) {
		// 		header('location: /admin/login');
		//    exit();
		// 	}
			
//}
   
}