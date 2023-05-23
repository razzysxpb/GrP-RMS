<?php
namespace woodlands\Controllers;

class courses {
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
}