<?php
namespace woodlands\Controllers;

class students {
    private $studentsTable;

    public function __construct($studentsTable) {
        $this->studentsTable = $studentsTable;
    }

    public function manageStudent() {
        if(isset($_GET['id'])){
        $students = $this->studentsTable->find('students_id',$_GET['id']);
        }else{
            $students = [];
        }

        return [
            'template' => 'manageStudent.html.php',
            'variables' => [
                'students' => $students
            ],
            'title' => 'Manage Student'
        ];
    }

    public function manageStudentSubmit() {
        if($_POST['student']['password']==""){
            unset($_POST['student']['password']);
        }
        $this->studentsTable->save($_POST['student']);
        header('location:/students/studentList');
    }

    public function studentList() {
        $students = $this->studentsTable->findAll();

        return [
            'template' => 'studentList.html.php',
            'variables' => [
                'students' => $students
            ],
            'title' => 'Student List'
        ];
    }

    public function deleteSubmit()
	{
		$this->studentsTable->delete($_POST['id']);

		header('location: /students/studentList');
    }
}
