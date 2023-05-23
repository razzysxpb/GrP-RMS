<?php
namespace woodlands\Entities;
class Modules {
  
    private $modulesTable;

    public $module_id;
    public $name;
    public $module_year;



  

    public function __construct(\central\DatabaseTable $modulesTable ) {
	$this->modulesTable=$modulesTable;
   
	}

    public function getModules(){
        return $this->modulesTable->findAll();
    }
    public function findModules($moduleId){
        return $this->modulesTable->find('module_id',$moduleId);
    }

}