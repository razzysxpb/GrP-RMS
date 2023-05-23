<?php
namespace woodlands\Entities;
class Courses {
  
    private $modulesTable;
    private $courseModulesTable;

    public $courses_id;
    public $name;



  

    public function __construct( \central\DatabaseTable $modulesTable, \central\DatabaseTable $courseModulesTable) {
		$this->modulesTable = $modulesTable;
        $this->courseModulesTable = $courseModulesTable;
   
	}

    public function getModules(){
        return $this->modulesTable->findAll();
    }
    public function findModules($module_id){
        return $this->modulesTable->find('module_id', $module_id);
    }

    public function courseModules(){
        $courseModules = $this->courseModulesTable->find('courses_id', $this->courses_id);
        $modules = [];
        foreach($courseModules as $courseModule){
            $modules[] = $this->modulesTable->find('module_id', $courseModule->modules_id);
        }
        return $modules;
    }

}