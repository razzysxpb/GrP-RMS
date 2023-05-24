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
    public function findModules($moduleId){
        return $this->modulesTable->find('module_id',$moduleId);
    }

    public function courseModules(){
        $courseModules = $this->courseModulesTable->find('courses_id',$this->courses_id);
        $modules = [];
        foreach($courseModules as $courseModule){
            $modules[] = $this->modulesTable->find('module_id',$courseModule->modules_id);
        }
        return $modules;
    }
    public function deleteLinks(){
        $links = $this->courseModulesTable->find('courses_id',$this->courses_id);
        foreach($links as $link){
            $this->courseModulesTable->delete($link->course_module_id);
        }
    }
    public function saveLinks($ids){
        foreach($ids as $id){
            $record = [];
            $record['courses_id'] = $this->courses_id;
            $record['modules_id'] = $id;
            $this->courseModulesTable->save($record);
        }

    }

}