<?php
namespace woodlands\Controllers;

class students {
    private $studentsTable;

    public function __construct($studentsTable) {
        $this->studentsTable = $studentsTable;
    }

    public function manageStudent()
{
    $students = $this->studentsTable->findAll(); // Fetch students from the database
    $student = false;

    if (isset($_GET['id'])) {
        $result = $this->studentsTable->find('students_id', $_GET['id']);

        if (!empty($result)) {
            $student = $result[0];
        }
    }

    return [
        'template' => 'manageStudent.html.php',
        'variables' => [
            'students' => $students,
            'student' => $student
        ],
        'title' => 'Manage Student'
    ];
}


public function manageStudentSubmit()
{
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
}
