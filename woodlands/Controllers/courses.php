<?php
namespace woodlands\Controllers;

class Courses {
    private $coursesTable;

    public function __construct($coursesTable) {
        $this->coursesTable = $coursesTable;
    }
    public function courses(){
        if(isset($_GET['id'])){
            $courses = $this->coursesTable->find('courses_id',$_GET['id']);
        }else{
        $courses = $this->coursesTable->findAll();
        }
        return [
            'template' => 'courses.html.php',
            'variables' => [
            'courses'=>$courses ],
            'title' => 'Courses'
        ];
    }
    public function manageCourse(){
        if(isset($_GET['id'])){
            $course = $this->coursesTable->find('courses_id',$_GET['id']);
        }
    
    return [
        'template' => 'manageCourse.html.php',
        'variables' => [
        'course'=>$course ],
        'title' => 'Manage Course'
    ];
    }
    public function manageCourseSubmit(){
        
        $course = $this->coursesTable->find('courses_id',$_POST['course_id'])[0];

        $course->deleteLinks();
        $course->saveLinks($_POST['module_id']);
        $_POST['course']['courses_id']=$_POST['course_id'];
        $this->coursesTable->save($_POST['course']);
      
        header('location: /courses/courses');
    }

    public function deleteSubmit()
	{
		$this->coursesTable->delete($_POST['id']);

		header('location: /courses/courses');
	}
}