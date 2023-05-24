<?php
namespace woodlands\Entities;
class Modules {
  
    private $modulesTable;
    private $moduleStaffTable;

    public $module_id;
    public $name;
    public $module_year;



  

    public function __construct(\central\DatabaseTable $modulesTable, \central\DatabaseTable $moduleStaffTable ) {
	$this->modulesTable=$modulesTable;
    $this->moduleStaffTable = $moduleStaffTable;
	}

    public function getModules(){
        return $this->modulesTable->findAll();
    }
    public function findModules($moduleId){
        return $this->modulesTable->find('module_id',$moduleId);
    }
    public function isOnModule($staff_id){
        $info = [];
        $info['modules_id']=$this->module_id;
        $info['staff_id'] = $staff_id;

        $moduleStaff = $this->moduleStaffTable->findArray($info);
        if(count($moduleStaff)===0){
            return false;
        }else{
            return true;
        }

    }

}