<?php
namespace woodlands\Entities;
class Modules {
  
    private $staffTable;

    public $module_id;
    public $name;
    public $module_year;



  

    public function __construct(\central\DatabaseTable $staffTable ) {
	$this->staffTable=$staffTable;
   
	}


}