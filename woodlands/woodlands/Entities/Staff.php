<?php
namespace woodlands\Entities;
class Staff {
    private $qualificationsTable;
    private $coursesTable;
    private $personalTutorialTable;
    private $modulesTable;
    private $attendanceTable;
    private $studentsTable;

    public $staff_id;
    public $status;
    public $dormancy_reason;
    public $firstname;
    public $middlename;
    public $surname;
    public $street;
    public $town;
    public $postcode;
    public $phone;
    public $email;
    public $roles;
    public $mod_leader;
    public $specialist_subjects;
    public $isAdmin;
    public $password;

  

    public function __construct(\central\DatabaseTable $qualificationsTable, \central\DatabaseTable $coursesTable, \central\DatabaseTable $personalTutorialTable,
    \central\DatabaseTable $studentsTable, \central\DatabaseTable $attendanceTable, \central\DatabaseTable $modulesTable) {
		$this->modulesTable = $modulesTable;
        $this->coursesTable = $coursesTable;
        $this->personalTutorialTable = $personalTutorialTable;
        $this->modulesTable = $modulesTable;
        $this ->studentsTable = $studentsTable;
        $this->attendanceTable = $attendanceTable;
	}

}