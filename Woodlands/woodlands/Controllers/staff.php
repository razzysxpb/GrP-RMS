<?php
namespace woodlands\Controllers;
class staff{
    private $staffTable;

    public function __construct($staffTable){
    $this->staffTable = $staffTable;
    }

    public function home(){
        return[
            'template'=>'home.html.php',
            'variables'=>[
                ],
            'title'=> 'Home'
        ];
    }

    public function manageStaff (){
        
     
    
        return[
            'template'=>'manageStaff.html.php',
            'variables'=>[],
            'title'=> 'Manage Staff'
        ];
    }
    public function manageStaffSubmit(){
        
        $this->staffTable->save($_POST['staff']);

        header('location:staff/manageStaff');

    }

   
}