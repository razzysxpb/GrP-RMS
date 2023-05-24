<?php
namespace woodlands\Entities;
class Messages {
  
    private $messagesTable;
    // private $studentsTable;

    public $message_id;
    public $title;
    public $description;
    public $date;
    public $students_id;



  

    public function __construct( \central\DatabaseTable $messagesTable) {
		$this->messagesTable = $messagesTable;
        // $this->studentsTable = $studentsTable;
   
	}


}