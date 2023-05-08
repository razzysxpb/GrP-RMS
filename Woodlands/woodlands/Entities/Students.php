<?php
namespace woodlands\Entities;
class Students {
    private $qualificationsTable;
    private $coursesTable;
    private $personalTutorialTable;
    private $modulesTable;
    private $attendanceTable;
  
    public $students_id;
    public $firstname;
    public $middlename;
    public $surname;
    public $dob;
    public $status;
    public $dormancy_reason;
    public $email;
    public $course_id;
    public $term_street;
    public $term_town;
    public $term_postcode;
    public $home_address;
    public $home_town;
    public $home_postcode;
    public $phone;
    public $password;
  
    

    public function __construct(\central\DatabaseTable $qualificationsTable, \central\DatabaseTable $coursesTable, \central\DatabaseTable $personalTutorialTable,
    \central\DatabaseTable $staffTable, \central\DatabaseTable $attendanceTable, \central\DatabaseTable $modulesTable) {
		    $this->modulesTable = $modulesTable;
        $this->coursesTable = $coursesTable;
        $this->personalTutorialTable = $personalTutorialTable;
        $this->modulesTable = $modulesTable;
        $this->staffTable=$staffTable;
        $this->attendanceTable = $attendanceTable;
	}

   
    

    
    
}