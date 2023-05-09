<?php
namespace woodlands\Controllers;
class students{
    private $studentsTable;

    public function __construct($studentsTable){
    $this->studentsTable = $studentsTable;
    }

    public function manageStudent (){
        
     
    
        return[
            'template'=>'manageStudent.html.php',
            'variables'=>[
                ],
            'title'=> 'Manage Student'
        ];
    }
    public function manageStudentSubmit(){
       
       
        
        $this->studentsTable->save($_POST['student']);

        header('location:/students/manageStudent');

    }
    public function studentList(){
        $students = $this->studentsTable->findAll();

        return[
            'template'=>'studentList.html.php',
            'variables'=>[
                'students'=>$students
                ],
            'title'=> 'Student List'
        ];
        
    }

    


   
}

    
   
